/**
 * Created by apple on 14-6-16.
 */
var GLOBAL = {},
    objectPrototype = Object.prototype,
    TOSTRING = Object.prototype.toString;

$.extend(GLOBAL,{
    type :  {
        'undefined'        : 'undefined',
        'number'           : 'number',
        'boolean'          : 'boolean',
        'string'           : 'string',
        '[object Function]': 'function',
        '[object RegExp]'  : 'regexp',
        '[object Array]'   : 'array',
        '[object Date]'    : 'date',
        '[object Error]'   : 'error'
    }
});
//JQUERY核心扩展
$.extend(jQuery,{
    isType : function(value)
    {
        return GLOBAL.type[typeof value] || GLOBAL.type[TOSTRING.call(value)] || (value ? 'object' : 'null');
    },
    isArray : function(value)
    {
        return objectPrototype.toString.apply(value) === '[object Array]';
    },
    isString : function(value)
    {
        return typeof value === 'string';
    },
    isEmpty : function(value)
    {
        return (value === null) || (value === undefined) || ((this.isArray(value) && !value.length));
    },
    isFunction: function(value)
    {
        return objectPrototype.toString.apply(value) === '[object Function]';
    },
    isObject: function(value)
    {
        return !!value && !value.tagName && objectPrototype.toString.call(value) === '[object Object]';
    },
    isBoolean : function(value)
    {
        return typeof value === 'boolean';
    },
    isNull : function(value)
    {
        return value === null;
    },
    isDate : function(value)
    {
        return this.isType(value) === 'date' && value.toString() !== 'Invalid Date' && !isNaN(value);
    },


    /**
     * 全局命名空间
     * @param arguments
     * @return void
     */
    nameSpace : function()
    {
        var a = arguments,
            o = null,
            globalObj,
            i = 1,
            j,
            d,
            arg;
        if(window[arguments[0]])
        {
            globalObj = window[arguments[0]];
        }
        else
        {
            window[arguments[0]] = {};
        }
        for(;i<a.length;i++)
        {
            o   = window[arguments[0]];
            arg = arguments[i];
            if(arg.indexOf('.'))
            {
                d = arg.split('.');
                for(j=0;j<d.length;j++)
                {
                    o[d[j]] = o[d[j]] || {};
                    o       = o[d[j]];
                }
            }
            else
            {
                o[arg] = o[arg] || {};
            }
        }
        return;
    },
    //系统默认Library继承。优先查看system library 然后查看application library 用MY_覆盖系统类
    extendLibrary:function(subClass,superClass)
    {
        var fi,proi;
        for(fi in superClass)
        {
            if(!subClass[fi])
            {
                subClass[fi] = superClass[fi];
            }
        }
        for(proi in superClass.prototype)
        {
            if(!subClass[proi])
            {
                subClass.prototype[proi] = superClass.prototype[proi];
            }
        }
        return subClass;
    },
    createController:function(controller)
    {
        var _this = this;
        if(!window[controller])
        {
            window[controller] = OS.Controllers[controller]={
                load : _this.load
            }
        }
        else
        {
            console.log('ERROR 已经存在的控制器名');
        }
    },
    createModel:function(model)
    {
        var _this = this,
            model_prefix = Config.model_prefix;
        if(!OS.Models[model_prefix+model])
        {
            OS.Models[model_prefix+model] = {};
        }
        return OS.Models[model_prefix+model];
    },
   /*createHelp:function(help,fn)
    {
        var help_prefix = Config.help_prefix,
            arr         = help.split('.'),
            obj         = OS.Helpers,
            i           = 0,
            len         = arr.length,
            last        = arr[len-1],
            nobj,k;
        if(!$.isFunction(fn))
        {
            console.log('ERROR,这不是一个函数对象');
            return;
        }
        if(len == 1)
        {
            OS.Helpers[help_prefix+help] = fn;
        }
        else
        {
            delete arr[len-1];
            arr.length = len -1 ;
            while(k = arr.shift())
            {
                if(! (k in obj))
                {
                    obj[k]={};
                    obj = obj[k];
                }
                else
                {
                    obj = obj[k];
                }
            }
            obj[last] = fn;
        }

    },*/
    createHelp:function(help,fn)
    {
        var help_prefix = Config.help_prefix;
        if($.isFunction(fn))
        {
            OS.Helpers[help_prefix+help] = fn;
        }
    },
    doController:function(controller,ready)
    {
        if(arguments[1] && arguments[1]==true)
        {
            $(document).ready(function(){
                if(window[controller] && $.isObject(window[controller]))
                {
                    if(window[controller] && $.isFunction(window[controller].__constructor))
                    {
                        window[controller].__constructor();
                    }
                    for(var i in window[controller])
                    {
                        if(i.indexOf('C_') == 0)
                        {
                            window[controller][i]();
                        }
                    }
                }
            });
        }
        else{
            if(window[controller] && $.isObject(window[controller]))
            {
                if(window[controller] && $.isFunction(window[controller].__constructor))
                {
                    window[controller].__constructor();
                }
                for(var i in window[controller])
                {
                    if(i.indexOf('C_') == 0)
                    {
                        window[controller][i]();
                    }
                }
            }
        }

    },
    load:{
        'library':function(classname)
        {
            var subclass_prefix = Config.subclass_prefix,
                superClass,subClass,returnClass;
            if(OS.Libraries[classname])
            {
                if(OS.Libraries[subclass_prefix+classname])
                {
                    superClass = OS.Libraries[classname];
                    subClass = OS.Libraries[subclass_prefix+classname];
                    returnClass = $.extendLibrary(subClass,superClass);
                }
                else
                {
                    returnClass = OS.Libraries[classname];
                }
                return new returnClass();
            }
            else
            {
                return false;
            }
        },
        'view':function(viewname)
        {
            var arr = viewname.split('.'),
                len = arr.length,
                obj = OS.Views,
                i   = 0,k;
            while(k = arr.shift())
            {
                if(! (k in obj))
                {
                    return null;
                }
                else
                {
                    obj = OS.Views[k];
                }
            }
            return obj;
        },
        'model':function(modelname)
        {
            var model_prefix = Config.model_prefix;
            if(OS.Models[model_prefix+modelname])
            {
                return OS.Models[model_prefix+modelname];
            }
            else{
                console.log('ERROR 不存在的model方法');
            }
        },
        'helper':function(helpname)
        {
            var help_prefix = Config.help_prefix;
            if(OS.Helpers[help_prefix+helpname])
            {
                return OS.Helpers[help_prefix+helpname];
            }
            else{
                console.log('ERROR 不存在的help方法');
            }
        }
    }
});

$.nameSpace('OS');
var Helpers     = OS.Helpers     = {},
    Models      = OS.Models      = {},
    Views       = OS.Views       = {},
    Libraries   = OS.Libraries   = {},
    Lang        = OS.Lang        = {},
    Controllers = OS.Controllers = {},
    Modules     = OS.Modules     = {};


$.extend(OS.Helpers,{
    getMousePosition: function(e) {
        var posX, posY;
        if (e.pageX || e.pageY) {
            posX = e.pageX;
            posY = e.pageY;
        }
        else {
            posX = e.clientX + document.documentElement.scrollLeft;
            posY = e.clientY + document.documentElement.scrollTop;
        }
        return {
            'x': posX,
            'y': posY
        }
    }
});