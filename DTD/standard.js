
function person(name){
    this.getName=function(){
        alert("Thank you!!!!!")
    }
}
person.prototype.sayHi=function(){
alert('My name is prototype!!');
}
var p = new person();
p.sayHi();
p.getName(); 