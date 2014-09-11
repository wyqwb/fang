       window.onload = function () {
            /*复选框*/
            var oTable = document.getElementsByTagName("table")[0];
            var aKuang = getByClass(oTable, "kuang");

            for (var i = 0; i < aKuang.length; i++) {
                aKuang[i].index = i;

                aKuang[i].onclick = function () {
                    var oSpan = aKuang[this.index].getElementsByTagName("span")[0];

                    oSpan.className = oSpan.className ? "" : "active"; 
                };
            }
        };

        /*选择类*/
        function getByClass(oParent, oName) {
            var all = oParent.getElementsByTagName("*");
            var aResult = new Array();
            for (var i = 0; i < all.length; i++) {
                if (all[i].className == oName) {
                    aResult.push(all[i]);
                }
            }
            return aResult;
        }
