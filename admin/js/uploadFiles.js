/**
 * Created by ShawnG on 2016/4/2.
 */


/**
 * 添加附件数量
 * @constructor
 */
function AddMorePic(){
    var more = document.getElementById("files");
    var br = document.createElement("br");
    var input = document.createElement("input");
    var button = document.createElement("input");

    input.type = "file";
    input.name = "files[]";

    button.type = "button";
    button.value = "Delete";
    button.className = "del20x20";
    button.style.padding= "0 0 0 15px";

    more.appendChild(br);
    more.appendChild(input);
    more.appendChild(button);

    button.onclick = function(){
        more.removeChild(br);
        more.removeChild(input);
        more.removeChild(button);
    };
}