/**
* @name Httpclient.
* @description To make fetch call of user.
*/
class Httpclient{
	/**
	* @name constructor.
	* @description To set url.
	* @param {String} url.
	*/
	constructor(url){
		this._url = url;
		
	}
	/**
	* @name _fetchJSON.
	* @description To fetch data from url & manage response & error.
	* @param {String} endpoint.
	* @param {Function Object} action.
	* @param {Function Object} err.
	*/
	async _fetchJSON(endpoint,action,err) {
	  let fetchRes = fetch(this._url+endpoint);
	  fetchRes.then(res => res.json()).then(action);
	  fetchRes.catch(err);
	}
}
/**
* @name User.
* @description To assign url & fetch json call of Httpclient.
*/
class User extends Httpclient{
	/**
	* @name constructor.
	* @description To set url into Httpclient.
	*/
	constructor(){
		super("https://jsonplaceholder.typicode.com/users/");
	}
	/**
	* @name get.
	* @description To call _fetchJSON function & manage respnose & error.
	* @param {String} endpoint.
	* @param {Function Object} action.
	* @param {Function Object} err.
	*/
	get(endpoint,action,err){
		this._fetchJSON(endpoint,action,err);
	}
}

export default User;