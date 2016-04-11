/**
 * Created by ShawnG on 2016/3/31.
 */

/**
 * username值的验证
 * @param userN
 * @returns {boolean}
 */
function usernameCheck(userN){
    var re_userN =/[^\w]/g;
    if(userN.value ==""){
        alert("Please enter username!!!");
        return false;
    }else if(re_userN.test(userN.value) || userN.value.length<6 || userN.value.length>15){
        alert("Username is invalid!!!");
        return false;
    }
    return true;
}

/**
 * password的验证
 * @param passW
 * @returns {boolean}
 */
function passwordCheck(passW){
    var re_num = /[^\d]/g;
    var re_cha = /[^a-zA-Z]/g;
    var re_1st = /^[A-Z]/g;
    if(passW.value==""){
        alert("Please enter password!!!");
        return false;
    }else if(re_num.test(passW.value)==false || re_cha.test(passW.value)==false || re_1st.test(passW.value)==false || passW.value.length<6 || passW.value.length>20){
        alert("Password is invalid!!!");
        return false;
    }
    return true;
}

/**
 * email的验证
 * @param eMail
 * @returns {boolean}
 */
function emailCheck(eMail){
    var reg_email = /^[a-z0-9](\w|\.|-)*@([a-z0-9]+-?[a-z0-9]+\.){1,3}[a-z]{2,4}$/g;
    if(eMail.value==""){
        alert("Please enter email address!!!");
        return false;
    }else if(reg_email.test(eMail.value)==false){
        alert("Email is invalid!!!")
        return false;
    }
    return true;
}

/**
 * first name 验证
 * @param fstN
 * @returns {boolean}
 */
function fstCheck(fstN){
    var re_cha = /[^a-zA-Z]/g;
    if(fstN.value==""){
        alert("Please enter first name!!!");
        return false;
    }else if(re_cha.test(fstN.value)==true || fstN.value.length>16){
        alert("First name is invalid!!!");
        return false;
    }
    return true;
}

/**
 * last name 验证
 * @param lstN
 * @returns {boolean}
 */
function lstCheck(lstN){
    var re_cha = /[^a-zA-Z]/g;
    if(lstN.value==""){
        alert("please enter last name!!!");
        return false;
    }else if(re_cha.test(lstN.value)==true || lstN.value.length>16){
        alert("Last name is invalid!!!");
        return false;
    }
    return true;
}

/**
 * Phone # 验证
 * @param phNum
 * @returns {boolean}
 */
function phNumCheck(phNum){
    var re_num = /[^\d]/g;
    if(phNum.value==""){
        alert("please enter phone number!!!");
        return false;
    }else if(re_num.test(phNum.value)==true||phNum.value.length>10 || phNum.value.length<10){
        alert("Phone number is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 地址验证
 * @param Addre
 * @returns {boolean}
 */
function addressCheck(Addre){
    if(Addre.value==""){
        alert("please enter address!!!");
        return false;
    }else if(Addre.value.length>50){
        alert("Address is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 课程ID验证
 * @param courId
 * @returns {boolean}
 */
function courIdCheck(courId){
    if(courId.value==""){
        alert("please enter course id!!!");
        return false;
    }else if(courId.value.length>4 || courId.value.length<4){
        alert("Course id is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 课程名称验证
 * @param courName
 * @returns {boolean}
 */
function courNameCheck(courName){
    var re_cha = /[^a-zA-Z\s]/g;
    if(courName.value==""){
        alert("Please enter course name!!!");
        return false;
    }else if(re_cha.test(courName.value)==true || courName.value.length>40){
        alert("Course name is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 课程总人数验证
 * @param capaValue
 * @returns {boolean}
 */
function capaCheck(capaValue){
    if(capaValue.value==""){
        alert("please enter capacity!!!");
        return false;
    }else if(capaValue.value.length>3){
        alert("Capacity is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 课程学分验证
 * @param credNum
 * @returns {boolean}
 */
function credCheck(credNum){
    var re_num=/[^0-9]/g;
    if(credNum.value==""){
        alert("please enter credit!!!");
        return false;
    }else if(credNum.value.length!=1||re_num.test(credNum.value)){
        alert("Credit is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 学科名称验证
 * @param subN
 * @returns {boolean}
 */
function subNameCheck(subN){
    var re_cha = /[^a-zA-Z\s\-]/g;
    if(subN.value==""){
        alert("Please enter subject name!!!");
        return false;
    }else if(re_cha.test(subN.value)==true || subN.value.length>40){
        alert("Subject name is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 学科缩写验证
 * @param subN
 * @returns {boolean}
 */
function subShortNameCheck(subN_short){
    var re_cha = /[^A-Z]/g;
    if(subN_short.value==""){
        alert("Please enter abbreviation!!!");
        return false;
    }else if(re_cha.test(subN_short.value)==true || subN_short.value.length>5){
        alert("Abbreviation is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 学期名字验证
 * @param termN
 * @returns {boolean}
 */
function termNameCheck(termN) {
    var re_cha = /[^\w]/g;
    if(termN.value==""){
        alert("Please enter term's name!!!");
        return false;
    }else if(re_cha.test(termN.value)==true || termN.value.length>40){
        alert("Term's name is invalid!!!");
        return false;
    }
    return true;
}

/**
 * 添加管理员单表验证by ID
 * @returns {boolean}
 */
function FormAdminCheck(){
    var userN = document.getElementById('username');
    var passW = document.getElementById('password');
    var eMail = document.getElementById('email');
    //username值的验证
    if(usernameCheck(userN)==false){
        return false;
    }
    //password的验证
    if(passwordCheck(passW)==false){
        return false;
    }
    //email的验证
    if(emailCheck(eMail)==false){
        return false;
    }
    return true;
}

/**
 * 教授单表验证
 * @returns {boolean}
 */
function FormProfCheck(){
    var allIn = document.getElementsByTagName('input');
    var fstN = allIn[5];
    var lstN = allIn[6];
    var eMail = allIn[7];
    var phNum = allIn[8];
    //first name 验证
    if(fstCheck(fstN)==false){
        return false;
    }
    //last name 验证
    if(lstCheck(lstN)==false){
        return false;
    }
    //email 验证
    if(emailCheck(eMail)==false){
        return false;
    }
    //phone #验证
    if(phNumCheck(phNum)==false){
        return false;
    }
    return true;
}

/**
 * 学生单表验证
 * @returns {boolean}
 */
function FormStudCheck(){
    var allIn = document.getElementsByTagName('input');
    var userN = allIn[5];
    var passW = allIn[6];
    var fstN = allIn[7];
    var lstN = allIn[8];
    var Addre = allIn[10];
    var eMail = allIn[11];
    var phNum = allIn[12];
    //username值的验证
    if(usernameCheck(userN)==false){
        return false;
    }
    //password验证
    if(passwordCheck(passW)==false){
        return false;
    }
    //first name验证
    if(fstCheck(fstN)==false){
        return false;
    }
    if(lstCheck(lstN)==false){
        return false;
    }
    if(addressCheck(Addre)==false){
        return false;
    }
    if(emailCheck(eMail)==false){
        return false;
    }
    if(phNumCheck(phNum)==false){
        return false;
    }
    return true;
}

/**
 * 添加课程单表验证by ID
 * @returns {boolean}
 */
function FormCourCheck(){
    var courId = document.getElementById('courseId');
    var courName = document.getElementById('courseName');
    var capaValue = document.getElementById('courseCapa');
    var credNum = document.getElementById('courseCred');
    if(courIdCheck(courId)==false){
        return false;
    }
    if(courNameCheck(courName)==false){
        return false;
    }
    if(capaCheck(capaValue)==false){
        return false;
    }
    if(credCheck(credNum)==false){
        return false;
    }
    return true;
}

/**
 * 学科单表验证
 * @returns {boolean}
 */
function FormSubCheck(){
    var allIn = document.getElementsByTagName('input');
    var subN = allIn[5];
    var subN_short = allIn[6];
    if(subNameCheck(subN)==false){
        return false;
    }
    if(subShortNameCheck(subN_short)==false){
        return false;
    }
    return true;
}

/**
 * 学期单表验证
 * @returns {boolean}
 * @constructor
 */
function FormTermCheck() {
    var allIn = document.getElementsByTagName('input');
    var termN = allIn[5];
    if(termNameCheck(termN)==false){
        return false;
    }
    return true;
}

/**
 * 学生档案修改
 * @returns {boolean}
 * @constructor
 */
function FormProfileCheck() {
    var allIn = document.getElementsByTagName('input');
    var passW = allIn[5];
    var Addre = allIn[6];
    var eMail = allIn[7];
    var phNum = allIn[8];
    //password验证
    if(passwordCheck(passW)==false){
        return false;
    }
    if(addressCheck(Addre)==false){
        return false;
    }
    if(emailCheck(eMail)==false){
        return false;
    }
    if(phNumCheck(phNum)==false){
        return false;
    }
}

/*获取含中文的字符串长度

 function getLength(str){
 return str.replace(/[^\x00-xff]/g,"xx").length
 }
 
对比字符串每个字符,如果相同，则+1

 function findStr(str,n){
 //str:字符串   n:对比的那个字符
 var tmp = 0;
 for(var i=0;i<str.length;i++){
 if(str.charAt(i)==n){
 tmp++;
 }
 }
 return tmp;
 }


 //用户名交互，分别为聚焦时、失焦后
 function usernameOn(user,msg){
 //先定义一个正则表达式，只能输入字母和数字，6-15位
 var re =/[^\w]/g;
 user.onfocus = function () {
 msg.style.display = "block";
 msg.innerHTML = '<i></i>6-15 characters long (only a-z, A-Z, 0-9)'
 }
 user.onblur = function(){
 if(this.value==""){
 msg.innerHTML = '<i></i>Cannot be Null'
 }else if(re.test(this.value) || user.value.length<6 || user.value.length>15){
 msg.innerHTML = '<i></i>Invalid Symbol'
 }else{
 msg.innerHTML = '<i></i>OK'
 }
 }
 }
 //密码交互，分别为聚焦时、失焦后
 function passwordOn(pwd,msg){
 //先定义一个正则表达式，只能输入字母和数字，首字母必须为大写，不能全为字母或者数字，也不能为符号
 //不能字符相同，不能全部数字，不能全部字母，首字母为大写，长度为6-20
 var re_num = /[^\d]/g;
 var re_cha = /[^a-zA-Z]/g;
 var re_1st = /^[A-Z]/g;
 pwd.onfocus = function(){
 msg.style.display = "block";
 msg.innerHTML = '<i></i><li>6-20 characters long</li>' +
 '<li>First character must be uppercase letter</li>' + '<li>Can\'t be a same type</li>';
 }
 pwd.onblur = function(){
 var combine = findStr(pwd.value,pwd.value[0]);
 if(this.value==""){
 msg.innerHTML = '<i></i>Cannot be Null'
 }else if(combine==this.value.length || re_num.test(this.value)==false || re_cha.test(this.value)==false || re_1st.test(this.value)==false || this.value.length<6 || this.value.length>20){
 msg.innerHTML = '<i></i>Invalid Symbol'
 }else{
 msg.innerHTML = '<i></i>OK'
 }
 }
 }
 */