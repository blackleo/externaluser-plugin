import User from "./User.js"
const usera = new User();
var previousid = 0;
/**
* @name myAction.
* @description To manage response from user api call.
* @param {Object} d.
*/
function myAction (d) {
  console.log('Only printing the resulting status of the call : ', d)
  
  if(previousid>0){
          const previousdivid = document.getElementById(previousid);
          previousdivid.innerHTML = "";
        }
  var id = d.id;
  const ul = document.getElementById(id);
                    let address = d.address;
                    let company = d.company;
                    ul.innerHTML  = "Name: "+ d.name + "<br />Username: "+d.username + "<br />eMail: "+d.email + "<br /><h4>Address </h4>Street: "+address.street + "<br />Suite:" + address.suite + "<br />City:" + address.city + "<br />Phone: "+d.phone + "<br />Website: "+d.website + "<br/><h4>Company</h4> Name: " + company.name + "<br />catchPhrase: " + company.catchPhrase + "<br/ >bs: " + company.bs ;
  previousid = id;                    

}
/**
* @name myerr.
* @description To manage error management.
* @param {Object} response.
*/
function myerr (response) {
  console.log('Only printing the error status of the call : ', response.statusText)
}
/**
* @name data.
* @description To manage user row click.
*/
export function data()
{
  var id = this.getAttribute("data-id");
	usera.get(id,myAction,myerr);
}
let elements= document.getElementsByClassName('dataid');
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', data, false);
}