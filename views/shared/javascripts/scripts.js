/*************************************************
 * IU Branding Bar & Footer
 * 
 * Version: 1.02
 * Author: IU Communications 
 * Author URI: http://communications.iu.edu
 ************************************************/

/****************************************
 * Google Custom Search Toggles
 ****************************************/
 
var googleSearchToggleOptions = {
    searchResultsUrl: 'search/index.shtml',
    searchId: 'cse-search-form',
    searchResultsId: 'cse-search-results-form'
};
var googleSearchToggles = function() {
    
    // Google brand statement
    var googleBrand = "Google™ Custom Search";
    
    // Prettify options
    for(var prop in googleSearchToggleOptions) this[prop] = googleSearchToggleOptions[prop];
    
    // Function: Update search form attributes
    function resetSearchAttr(formObj) {
        formObj.setAttribute('action', searchResultsUrl);
        formObj.removeAttribute('target');
		formObj.onsubmit = function() {
			if(formObj.as_q){
				if(formObj.as_q.value == googleBrand){
					formObj.as_q.value = '';  
				}
			}
			else {
				if(formObj.q.value == googleBrand){
					formObj.q.value = '';  
				}
			}
		}
    }
  
    // Function: Add Google branding
    function addGoogleBranding(formKeywordsObj) {
        formKeywordsObj.removeAttribute('placeholder');
        if(formKeywordsObj.value == '') { 
            formKeywordsObj.value = googleBrand; 
        }
        formKeywordsObj.onfocus = function() { 
            if(this.value == googleBrand){
                this.value = ''; 
            }
        }
        formKeywordsObj.onblur = function(){ 
            if(this.value == ''){ 
                this.value = googleBrand; 
            } 
        }
    }
	
	// Function: Get CX ID for autocomplete
	function getCxId(formObj, formKeywordsObj){
		var cx;
		if(formObj.cx.length>1){
			for(i = 0; i < formObj.cx.length; i++) {
				if(formObj.cx[i].checked){
					cx = formObj.cx[i].value;
				}
				formObj.cx[i].onfocus = function() {
					cx = this.value;
					for(i = 0; i < document.getElementsByTagName("table").length; i++) {
						if(document.getElementsByTagName("table")[i].getAttribute("class") && document.getElementsByTagName("table")[i].getAttribute("class").indexOf("gssb_c")!=-1){
							gcsTable = document.getElementsByTagName("table")[i];
							gcsTable.parentNode.removeChild(gcsTable);
						}
					}
					google.search.CustomSearchControl.attachAutoCompletionWithOptions(cx, document.getElementById(formKeywordsObj.id), formObj.id);
				}
			}
		}
		else {
			cx = searchObj.cx.value;
		}
		return cx;
	}
	
	// Function: Get URL parameters 
	function getUrlParam(){
		var vars = {};
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
		return vars;	
	}
  
    // Run if search form is in DOM
    if(document.getElementById(searchId)){
        // Set search form as variable
        var searchObj = document.getElementById(searchId);
        // Set search form keyword field as variable
        var searchKeywordsObj;
        if(searchObj.as_q){
            searchKeywordsObj = searchObj.as_q; 
        }
        else {
            searchKeywordsObj = searchObj.q;
        }
        // Update search form attributes
        resetSearchAttr(searchObj);
        // Add Google branding 
        addGoogleBranding(searchKeywordsObj);
		// Get CX ID for autocomplete
		var searchCX = '';
		searchCX = getCxId(searchObj, searchKeywordsObj);
    }
      
    // Run if search results form is in DOM
    if(document.getElementById(searchResultsId)){
		
        // Set search results form as variable
        var searchResultsObj = document.getElementById(searchResultsId);
        // Set search results form keyword field as variable
        var searchResultsKeywordsObj;
        if(searchResultsObj.as_q){
            searchResultsKeywordsObj = searchResultsObj.as_q;   


        }
        else {
            searchResultsKeywordsObj = searchResultsObj.q;
        }
		// Update search form attributes
        resetSearchAttr(searchResultsObj);
		// Get CX ID for autocomplete
		var searchResultsCX = '';
		searchResultsCX = getCxId(searchResultsObj, searchResultsKeywordsObj);
        // Get URL parameters
		var vars = getUrlParam();
		var isBlank = false;
		this.vars = vars;
        // Get keywords and toggle choice from URL parameters and unescape GCS account ID
        if(searchResultsObj.as_q) {
            if(this.vars['as_q']){
                this.vars['as_q'] = unescape(this.vars['as_q']);
            }
            else {
                isBlank=true;
            }
            this.vars['q'] = decodeURI(unescape(this.vars['q']));
        }
        else {
            this.vars['q'] = unescape(this.vars['q']);
        }
        this.vars['cx'] = unescape(this.vars['cx']);
		
        // Function: Find and set toggle choice
        function getToggleChoice() {
            var radios = '';
            var scope = '';
            // First hit 
            if(searchResultsObj.as_q) {
                scope = this.vars['q'];
                radios = searchResultsObj.q;
            }
            else {
                scope = this.vars['cx'];
                radios = searchResultsObj.cx;
            }
            // Second hit
            if(this.vars['scope']) {
                scope = this.vars['q'].split('+');
                scope = scope[0];
                radios = searchResultsObj.q;
            }
            if(this.vars['custom']) {
                scope = this.vars['cx'];
                radios = searchResultsObj.cx;   
            }
            for(i = 0; i < radios.length; i++) {
                radios[i].checked=false;
                if(unescape(radios[i].value) == scope || decodeURI(unescape(radios[i].value)) == scope || radios[i].value == scope) {
                    radios[i].checked=true;
                }
            }
        }
      
        // First hit to results page = add keywords to results form keyword field, redirect to new URL string to update search results, and update site selection from URL parameters
        if(this.vars['ie']) {
            getToggleChoice();
            if(this.vars['as_q'] || isBlank==true) {
                window.location = this.searchResultsUrl + '?q=' + this.vars['q'] + '+' + this.vars['as_q'] + '&cx=' + this.vars['cx'] + '&scope=1&js=1';
                searchResultsKeywordsObj.setAttribute('value', this.vars['as_q'].replace(/\+/g, ' '));
            }
            else {
                window.location = this.searchResultsUrl + '?q=' + this.vars['q'] + '&cx=' + this.vars['cx'] + '&custom=1&js=1';
                searchResultsKeywordsObj.setAttribute('value', this.vars['q'].replace(/\+/g, ' '));
            }
        }

        // Second hit to results page = update keyword from URL parameters, add keywords results to form keyword field, and update site selection from URL parameters
        if(this.vars['js']) {
            getToggleChoice();
            if(this.vars['scope']) {
                var parts = this.vars['q'].split('+');
                var keywords = '';
                for(i = 1; i < parts.length; i++) {
                    keywords += parts[i]+" ";
                }
            }
            else {
                keywords = this.vars['q'];
                keywords = keywords.replace(/\+/g, ' ');
            }   
            // Strip leading and trailing spaces
            keywords = keywords.replace(/^\s+|\s+$/g,'');
            if(keywords.indexOf(googleBrand)!=-1){
                keywords = googleBrand;
            }
            searchResultsKeywordsObj.setAttribute('value', keywords);
		}
            
        // Add Google branding 
        addGoogleBranding(searchResultsKeywordsObj);
    }

	
	// Google search code
	if(document.getElementById(searchId) || document.getElementById(searchResultsId)){		
		var myCallback = function() {
			if(document.getElementById(searchId)){
				if(document.readyState == 'complete'){
					google.search.CustomSearchControl.attachAutoCompletionWithOptions(searchCX, document.getElementById(searchKeywordsObj.id), searchId);
				}
			}
			if(document.getElementById(searchResultsId)){
				// Get URL parameters
				var vars = getUrlParam();
				this.vars = vars;
				this.vars['cx'] = unescape(this.vars['cx']);
				if(document.readyState == 'complete'){
					if(this.vars['cx']!='undefined'){
						google.search.CustomSearchControl.attachAutoCompletionWithOptions(this.vars['cx'], document.getElementById(searchResultsKeywordsObj.id), searchResultsId);
					}
					else {
						google.search.CustomSearchControl.attachAutoCompletionWithOptions(searchResultsCX, document.getElementById(searchResultsKeywordsObj.id), searchResultsId);
					}
					google.search.cse.element.render({
						div: 'gcse-searchbox',
						tag: 'searchresults-only',
						attributes: {
							enableHistory: true,
							autoSearchOnLoad: true,
							queryParameterName: 'q',
							gaQueryParameter: 'q'
						}
					}); 
				} else {
					google.setOnLoadCallback(function(){
						google.search.cse.element.render({
							div: 'gcse-searchbox',
							tag: 'searchresults-only',
							attributes: {
								enableHistory: true,
								autoSearchOnLoad: true,
								queryParameterName: 'q',
								aQueryParameter: 'q'
							}
						});
					});
				}
			}
        }
		window.__gcse = {
           parsetags: 'explicit',
           callback: myCallback
        };
		(function() {
			var gcse = document.createElement('script'); gcse.type = 'text/javascript';
			gcse.async = true;
			if(document.getElementById(searchResultsId)){
				// Get URL parameters
				var vars = getUrlParam();
				this.vars = vars;
				this.vars['cx'] = unescape(this.vars['cx']);
				if(this.vars['cx']!='undefined'){
					gcse.src = '//www.google.com/cse/cse.js?cx=' + this.vars['cx']; 
				}
				else {
					gcse.src = '//www.google.com/cse/cse.js?cx=' + searchResultsCX; 
				}
			}
			else {
				gcse.src = '//www.google.com/cse/cse.js?cx=' + searchCX; 
			}
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s)
		})();
	}
}

var init = function(){
    googleSearchToggles();
}

window.addEventListener ? 
window.addEventListener("load", init, false) : 
window.attachEvent && window.attachEvent("onload", init);