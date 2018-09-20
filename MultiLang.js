
var MultiLang = function(api_url, default_callback){

	var self = this;

	this.url = api_url,
	this.lang = 'EN',
	this.last_data = {}
	this.default_callback = default_callback;

	this.tr = function(to_translate, callback){

		var xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status == 200){
				
				self.last_data = JSON.parse(this.responseText);

				if(callback!=null){

					callback(self.last_data.text, self.last_data.translated, self.last_data.language);
				
				}else if(self.default_callback!=null){

					self.default_callback(self.last_data.text, self.last_data.translated, self.last_data.language);
				}
			}
		};

		xhttp.open('POST', self.url, true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send('lang='+this.lang+'&tr='+to_translate);
	};

	this.translated = function(){

		return last_data.translated;
	};

	this.setLanguage = function(lang_code){

		if((lang_code+'').length>2){
			
			console.error('Error in MultiLang.setLanguage - Invalid Language Code: '+lang_code);
			return false;
		}

		this.lang = lang_code;

		return true;
	};

	this.language = function(){

		return this.lang;
	};

	return this;
};