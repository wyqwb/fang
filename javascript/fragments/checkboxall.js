        window.onload = function () {
            var oMore = document.getElementById("more");
            var oMoreDrop = document.getElementById("moreDro");
            var moreClassName = "pub_hand more ";

            /*more的下拉框*/
            oMore.onclick = function () {
                if (oMoreDrop.style.display == "block") {
                    oMoreDrop.style.display = "none";
                    oMore.className = moreClassName; 
                }
                else {
                    oMoreDrop.style.display = "block";
                    oMore.className = moreClassName + "active";
                }
            };

            /*复选框*/
            var oTable = document.getElementsByTagName("table")[0];
            var aKuang = getByClass(oTable, "kuang");

            for (var i = 0; i < aKuang.length; i++) {
                aKuang[i].index = i;
                var iIndex = i;

                aKuang[i].onclick = function () {
                    var oSpan = aKuang[this.index].getElementsByTagName("span")[0];
                    if (this.index == 0) {//如果是总复选框时，执行以下操作
                        if (oSpan.className) {//如果总复选框选中时点击后，下面的子复选框全部取消选中
                            for (var j = 0; j < aKuang.length; j++) {
                                aKuang[j].getElementsByTagName("span")[0].className = "";
                            }
                        }
                        else {//如果总复选框未选中时点击后，下面的子复选框全部变为选中状态
                            for (var j = 0; j < aKuang.length; j++) {
                                aKuang[j].getElementsByTagName("span")[0].className = "active";
                            }
                        }
                    }
                    else {//如果是子复选框时，执行以下操作
                        oSpan.className = oSpan.className ? "" : "active";
                        if (!oSpan.className) {//只要子复选框有一个不选中则总复选框变为未选中状态
                            aKuang[0].getElementsByTagName("span")[0].className = "";
                        }
                        //如果子复选框为全部选中状态，则总复选框变为选中状态
                        var allSelected = true;
                        for (var j = 1; j < aKuang.length; j++) {
                            if (!aKuang[j].getElementsByTagName("span")[0].className) {
                                allSelected = false;
                            }
                        }
                        if (allSelected) {
                            aKuang[0].getElementsByTagName("span")[0].className = "active";
                        }
                    }
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