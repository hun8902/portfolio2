/**
 * jHelper
 * 
 * 주의 : jquery 선언 이후 로딩해야 하며 변수나 함수명 시작문자열이 언더바(_) 일 경우는 외부에서 사용하지 않도록 한다.
 * 
 * <pre>
 * 사용개체 : 
 * 
 * 
 * $.jHelper : 아래의 객체들을 모두 가지고 있는 최상위 객체 $.jHelper.validater, $.jHelper.form, $jHelper.util 
 * $.validator : 이메일 숫자 공백 날짜 등의 간단한 검증 
 * $.form('폼명') : 폼값의 get/set 이나 폼 입력값에 대한 검증 
 * $.util : ajax 호출 및 문자열에 대한 pading, cut, casting 등의 문자열 처리
 * 2014.12.16 - init
 * </pre>
 */
var ua = navigator.appVersion.toLowerCase();
var gIsWin = (ua.indexOf('win') != -1) ? true : false;
var gIsIE6 = /msie 6/i.test(ua);
var gIsIE = /msie/i.test(ua) || /trident/i.test(ua);
    
(function() {

    $.validator = {
        isEmail : function(v) {
            return v.match(/(.{3,}[@]{1}.+([\.]+[a-zA-Z0-9]+)$)/gim) ? true : false;
        },
        isNumber : function(v) { //마이너스 가리지 않고 숫자이면 true
            if(typeof(v) == 'number') return true;
            return String(v).match(/^[-]*[0-9,]+([\.]{1}[0-9]+)*$/gim) ? true : false;
        },
        isRatioNumber : function(v) { //마이너스가 아닌 숫자일때만 true
            return String(v).match(/^[0-9]+([\.]{1}[0-9]+)*$/gim) ? true : false;
        },
        getByte : function(str) {
            str = String(str);
            var _len = str.length;
            var _length = 0;
            for (var i = 0; i < _len; i++) {
                if (str.charCodeAt(i) > 255)
                    _length++;
                _length++;
            }
            return _length;
        },
        isContainsBlankChar : function(str) {
            return str.match(/[\s]/g) ? true : false;
        },
        isContainsSpecialChar : function(str) {
            return str.match(/[~!@\#$%^&*\()\=+_']/gi) ? true : false;
        },
        isValidYMD : function(ymdStr) {
            ymdStr = $.util.replaceAll(ymdStr, '-', '');

            var pt = /^\d{4}\d{2}\d{2}$/;

            if (!pt.test(ymdStr)) {
                return false;
            }

            var year = Number(ymdStr.substring(0, 4));
            var month = Number(ymdStr.substring(4, 6));
            var day = Number(ymdStr.substring(6));

            var monthDay = [
                    31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
            ];

            var isValid = false;

            // 날짜가 0이면 false
            if (day == 0) {
                return false;
            }

            // 윤년여부
            var isLeaf = false;

            if (year % 4 == 0) {
                isLeaf = true;

                if (year % 100 == 0) {
                    isLeaf = false;
                }

                if (year % 400 == 0) {
                    isLeaf = true;
                }
            }

            // 윤년일때
            if (isLeaf) {
                if (month == 2) {
                    if (day <= monthDay[month - 1] + 1) {
                        isValid = true;
                    }
                } else {
                    if (day <= monthDay[month - 1]) {
                        isValid = true;
                    }
                }
            } else {
                if (day <= monthDay[month - 1]) {
                    isValid = true;
                }
            }

            return isValid;
        },
        isValidYM : function(ymStr) {
            ymStr = $.util.replaceAll(ymStr, '-', '');

            var pt = /^\d{4}\d{2}$/;

            if (!pt.test(ymStr)) {
                return false;
            }

            var date = new Date();
            date.setFullYear(ymStr.substring(0, 4));
            date.setMonth(parseInt(ymStr.substring(4, 6), 10) - 1);

            if (date.getFullYear() != parseInt(ymStr.substring(0, 4), 10) || date.getMonth() + 1 != parseInt(ymStr.substring(4, 6), 10)) {
                return false;
            }

            return true;
        },
        isIncludeNumAndAlpha : function (str, min, max) {
            var rtn= { result:true, msg:''};
            
            //var check = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,16}$/;
            var check = /^(?=.*[a-zA-Z])(?=.*[0-9]).{0,}$/;

            if (!check.test(str))     {
                rtn.result = false;
                rtn.msg = '문자, 숫자의 조합으로 입력해주세요.';
                return rtn;
            }

            if (str.length < min || str.length > max) {
                rtn.result = false;
                rtn.msg = ''+ min +' ~ '+ max +' 자리로 입력해주세요.';
                return rtn;
            }

            return rtn;
        },
        isNotSpecialChar : function (str, min, max) {
            var rtn= { result:true, msg:''};
            
//            var check = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,16}$/;
            var check = /^(?=.*[!@#$%^&*+=-]).{0,}$/;

            if (check.test(str))     {
                rtn.result = false;
                rtn.msg = '특수문자는 사용할 수 없습니다.';
                return rtn;
            }

            if (str.length < min || str.length > max) {
                rtn.result = false;
                rtn.msg = ''+ min +' ~ '+ max +' 자리로 입력해주세요.';
                return rtn;
            }

            return rtn;
        },
        isIncludeNumOrAlpha : function (str, min, max) {
            var rtn= { result:true, msg:''};
            
            //var check = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,16}$/;
            var check = /^(?=.*[a-zA-Z])|(?=.*[0-9]).{0,}$/;

            if (!check.test(str))     {
                rtn.result = false;
                rtn.msg = '문자 또는 숫자 로만 입력해주세요.';
                return rtn;
            }

            if (str.length < min || str.length > max) {
                rtn.result = false;
                rtn.msg = ''+ min +' ~ '+ max +' 자리로 입력해주세요.';
                return rtn;
            }

            return rtn; 
        },
        isOnlyNumAndAlpha : function (str, min, max) {
            var rtn= { result:true, msg:''};
            
            var check = /^(?=.*[a-zA-Z]).{1,}(?=.*[0-9]).{1,}$/;

            if (!check.test(str))     {
                rtn.result = false;
                rtn.msg = '문자 또는 숫자 로만 입력해주세요.';
                return rtn;
            }

            if (str.length < min || str.length > max) {
                rtn.result = false;
                rtn.msg = ''+ min +' ~ '+ max +' 자리로 입력해주세요.';
                return rtn;
            }

            return rtn; 
        },
        isOnlyNumOrAlpha : function (str, min, max) {
            var rtn= { result:true, msg:''};
            
            var check = /[^a-zA-Z0-9]/; //W

            if (check.test(str))     {
                rtn.result = false;
                rtn.msg = '문자 또는 숫자 로만 입력해주세요.';
                return rtn;
            }

            if (str.length < min || str.length > max) {
                rtn.result = false;
                rtn.msg = ''+ min +' ~ '+ max +' 자리로 입력해주세요.';
                return rtn;
            }

            return rtn; 
        }
    };
    $.form = function() {
        /* 언더바(_)가 붙은 변수 또는 함수 그리고 일반 변수는 외부에서 사용하지 않도록 해주세요 하단의 허용함수만 사용합니다. */
        var _isNotEmpty = function(o) {
            return !_isEmpty(o);
        };
        var _isEmpty = function(o) {
            return (o == null || o == undefined || o == 'null' || o == 'undefined' || o == '') ? true : false;
        };
        var _rp = function(str) {
            if (_isNotEmpty(str))
                str = str.replace(/[&]/gm, '%26').replace(/[+]/gm, '%2B');
            return str;
        };
        var rf = typeof arguments[0] == 'string' ? document[arguments[0]] : arguments[0];

        rf._alert = function() {
            alert(arguments[0]);
        };
        rf._getElementType = function(ele) {
            var _type = $(ele).attr('type');
            if (ele.nodeName && ele.nodeName == 'TEXTAREA')
                _type = 'textarea';
            if (ele.nodeName && ele.nodeName == 'SELECT')
                _type = 'select';
            return _type;
        };
        rf._validate = function(ele) {
            var _bool = true;
            if (ele) {
                for (var i = 0; i < ele.length; i++) {
                    var _attr = this._getAttr(ele[i]);
                    var _type = this._getElementType(ele[i]);
                    if (_type) {
                        _type = _type.toLowerCase();
                        if (!_isEmpty(_type)) {
                            if (_type == 'text' || _type == 'password' || _type == 'textarea' || _type == 'hidden') {
                                if (_attr.msg) {
                                    _bool = this._checkText(_attr);
                                    if (_bool && _attr.maxbyte)
                                        _bool = this._checkByte(_attr);

                                }
                                
                            } else if (_type == 'email') {
                                if (_attr.msg) {
                                    _bool = this._checkText(_attr);
                                    if (_bool)
                                        _bool = this._checkEmail(_attr);
                                    if (_bool && _attr.maxbyte)
                                        _bool = this._checkByte(_attr);
                                }else if ( !_isEmpty(_attr.target.value) ){
                                	/**
                                	 * 이메일이 필수가 아니더라도 값이 있으면 형식 체크는 하도록 변경 
                                	 */
                                	_bool = this._checkEmail(_attr);
                                }
                                /*
                                if (_attr.msg) {
                                    _bool = this._checkText(_attr);
                                    if (_bool)
                                        _bool = this._checkEmail(_attr);
                                    if (_bool && _attr.maxbyte)
                                        _bool = this._checkByte(_attr);
                                }
                                */
                            } else if (_type == 'number') {
                                if (_attr.msg) {
                                    _bool = this._checkText(_attr);
                                    if (_bool)
                                        _bool = this._checkNumber(_attr);
                                }
                            } else if (_type == 'checkbox') {
                                _bool = _attr.msg ? this._checkCheckBox(_attr) : true;
                            } else if (_type == 'radio') {
                                _bool = _attr.msg ? this._checkRadioBox(_attr) : true;
                            } else if (_type == 'select') {
                                _bool = _attr.msg ? this._checkSelectBox(_attr) : true;
                            } else if (_type == 'file') {
                                _bool = _attr.msg ? this._checkFile(_attr) : true;
                                if (_isNotEmpty(_attr.target.value) && _attr.extension && _bool)
                                    _bool = this._checkExtension(_attr);
                            }
                            if (_bool && _attr.func) {
                                if (_attr.func.match(/[a-zA-Z0-9]+[\s]*[\(].*[\)]/g))
                                    _bool = eval('' + _attr.func);
                                else
                                    _bool = eval('' + _attr.func + '.call();');
                            }
                            if (!_bool) {
                                try {
                                    ele[i].focus();
                                    
                                    try {
                                        /* 타브라우저는 포커스 항목이 가운데로 이동되는데 
                                         * ie 에서는 최상단으로 이동되어 상단에 레이어등이 있을 경우 가려지게 되고
                                         * 실 내용이 그 위에 있을때는 보여지지 않아 스크롤을 더 내림. 
                                         */
                                        var real_tag = 'input';
                                        if(_type == 'select') {
                                            real_tag = 'select';
                                        } else if (_type == 'textarea') {
                                            real_tag = 'textarea';
                                        }

                                        var $elePos = $(real_tag +'[name="' + ele[i].name + '"]').position();
                                        $(window).scrollTop($elePos.top);
                                    } catch(e) {}

                                } catch (e) {
                                    alert(e);
                                }
                                break;
                            }
                        }
                    }
                }
            }
            return _bool;
        };
        rf._find = function(selector) {
            var ro = [];
            $(rf).find(selector).each(function() {
                ro.push(this);
            });
            return ro;
        };
        rf._getEle = function(nm) {
            var tnm = nm, p = null;
            if (nm.match(/([\[]{1}[_0-9a-zA-Z]+[:]{1}[_0-9a-zA-Z]+[\]]{1})/gim) != null) {
                p = nm.match(/([\[]{1}[_0-9a-zA-Z]+[:]{1}[_0-9a-zA-Z]+[\]]{1})/gim);
                for (var i = 0; i < p.length; i++)
                    tnm = tnm.replace(String(p[i]), '');
            }

            var _ele = [];
            for (var i = 0; i < this.elements.length; i++) {
                if (this.elements[i].name && this.elements[i].name == tnm) {
                    if (p != null) {
                        if (this.isMatch(this.elements[i], p))
                            _ele.push(this.elements[i]);
                    } else
                        _ele.push(this.elements[i]);
                }
            }
            return _ele;
        };
        rf._checkByte = function(o) {
            var _bool = true;
            var b = $.validator.getByte(o.target.value);
            if (b > parseInt(o.maxbyte, 10)) {
                this._alert(o.maxbyte + 'byte 이내로 입력해주세요.');
                _bool = false;
            }
            return _bool;
        };

        rf._checkExtension = function(o) {
            var _bool = false;
            var str = o.target.value;
            var ext = str.match(/[\.]+[a-zA-Z0-9]+$/gim);
            if (ext) {
                ext = String(ext).toLowerCase().replace(/\./, '');
                var extension = ',' + o.extension.toLowerCase() + ',';
                _bool = extension.indexOf(',' + ext + ',') > -1 ? true : false;
                if (!_bool)
                    this._alert(o.extension.toLowerCase() + '형식의 파일만 사용 가능합니다.');
            }
            return _bool;
        };
        rf._checkFile = function(o) {
            var _bool = true;
            if (_isEmpty(o.target.value)) {
                this._alert(o.msg);
                _bool = false;
            }
            return _bool;
        };
        rf._checkSelectBox = function(o) {
            var _bool = true;
            if (!o.target.options || o.target.options.length == 0) {
                _bool = false;
            } else {
                if (_isEmpty(o.target.options[o.target.options.selectedIndex].value)) {
                    this._alert(o.msg);
                    _bool = false;
                }
            }
            return _bool;
        };
        rf._checkRadioBox = function(o) {
            var _bool = true, _checkCnt = 0;
            ;
            var _o = this._find('input[name="' + o.target.name + '"]');
            for (var i = 0; i < _o.length; i++)
                if (_o[i].checked)
                    _checkCnt++;
            if (_checkCnt > 0)
                _bool = true;
            else {
                this._alert(o.msg);
                _bool = false;
            }
            return _bool;
        };
        rf._checkCheckBox = function(o) {
            var _bool = true, _checkCnt = 0;
            var _o = this._find('input[name="' + o.target.name + '"]');
            for (var i = 0; i < _o.length; i++)
                if (_o[i].checked)
                    _checkCnt++;
            if (_checkCnt > 0)
                _bool = true;
            else {
                this._alert(o.msg);
                _bool = false;
            }
            return _bool;
        };
        
        rf._checkText = function(o) {
            var _bool = true;
            if (_isEmpty(o.target.value)) {
                this._alert(o.msg);
                _bool = false;
            }
            return _bool;
        };
        rf._checkEmail = function(o) {
            var _bool = true;
            if (!$.validator.isEmail(o.target.value)) {
                alert('올바른 형식의 이메일 주소가 아닙니다.');
                _bool = false;
            }
            return _bool;
        };
        rf._checkNumber = function(o) {
            var _bool = true;
            if (!$.validator.isNumber(o.target.value)) {
                alert('숫자만 입력해 주세요');
                _bool = false;
            }
            return _bool;
        };
        rf._getAttr = function(o) {
            var retVal = {
                target : o,
                msg : o.getAttribute('data-msg'),
                extension : o.getAttribute('data-extension'),
                maxbyte : o.getAttribute('data-maxbyte'),
                func : o.getAttribute('data-function')
            };
            return retVal;
        };
        rf._selectedTextIndex = function(o, txt) {
            var _returnIdx = -1;
            if (this._isSelectBox(o)) {
                for (var i = 0; i < o.options.length; i++) {
                    if (o.options[i].value == txt) {
                        _returnIdx = i;
                        break;
                    }
                }
            }
            return _returnIdx;
        };
        rf._isSelectBox = function(o) {
            return (o && o.nodeName && o.nodeName.toLowerCase() == 'select');
        };
        rf._set = function(nm, val) {
            var _e = this._getEle(nm);
            if (_e.length) {
                for (var i = 0; i < _e.length; i++) {
                    var _type = this._getElementType(_e[i]);
                    _type = _type.toLowerCase();
                    if (_type == 'select') {
                        if (_e[i].options && _e[i].options.length) {
                            for (var j = 0; j < _e[i].options.length; j++) {
                                if (_e[i].options[j].value == val) {
                                    _e[i].options[j].selected = true;
                                }
                            }
                        }
                    } else if (_type == 'checkbox' || _type == 'radio') {
                        if (_e[i].value == val) {
                            _e[i].checked = true;
                        }
                    } else {
                        _e[i].value = val;
                    }
                }
            } else {
                if (nm.match(/([\[]{1}[_0-9a-zA-Z]+[:]{1}[_0-9a-zA-Z]+[\]]{1})/gim) == null) {
                    var _e = document.createElement('INPUT');
                    _e.type = 'hidden';
                    _e.id = nm;
                    _e.name = nm;
                    _e.value = val;
                    rf.appendChild(_e);
                    _e.setAttribute('data-added', 'Y');
                }
            }
            return rf;
        };

        rf._getEleAttr = function(t, p) {
            var o = [];
            for (var i = 0; i < t.length; i++) {
                if (this.isMatch(t[i], p))
                    o.push(t[i]);
            }
            return o;
        };
        rf._get = function(nm) {
            var _e = this._getEle(nm);
            var _val = '';
            for (var i = 0; i < _e.length; i++) {
                var _type = this._getElementType(_e[i]);
                _type = _type.toLowerCase();
                if (_type == 'text' || _type == 'hidden' || _type == 'email' || _type == 'password' || _type == 'number' || _type == 'textarea' || _type == 'file') {
                    if (_e[i].value) {
                        if (_val != '')
                            _val += ',';
                        _val += _e[i].value;
                    }
                } else if (_type == 'checkbox' || _type == 'radio') {
                    if (_e[i].checked) {
                        if (_val != '')
                            _val += ',';
                        _val += _e[i].value;
                    }
                } else if (_type == 'select') {
                    if (_e[i].options && _e[i].options.length) {
                        if (_e[i].options[_e[i].options.selectedIndex]) {
                            if (_e[i].options[_e[i].options.selectedIndex].value != '') {
                                if (_val != '')
                                    _val += ',';
                                _val += _e[i].options[_e[i].options.selectedIndex].value;
                            }
                        }
                    }
                }
            }
            return _val;
        };
        rf._hasKey = function(el, key) {
            var _bool = false;
            for (var i = 0; i < el.length; i++) {
                if (el[i] == key) {
                    _bool = true;
                    break;
                }
            }
            return _bool;
        };
        rf._beforeSubmit = function() {

        };

        /* 외부 사용 허용 함수 */
        rf.csubmit = function(action_url, method_type, target) {

            this._beforeSubmit();
            
            if(!action_url) {
                action_url = rf.action; 
            }
            
            if(!method_type) {
                method_type = 'url'; 
            }

            if(!target) {
                target = ''; 
            }
            
            var _uri_string = '';
            var _get_string = '';
            var _uri_item = []; 
            var _params = []; 

            if('url' == method_type) {
                
                for (var i = 0; i < this.elements.length; i++) {
                    data_url = this.elements[i].getAttribute('data-url');
                    if(data_url) {
                        _uri_item.push(this.elements[i]);
                    }
                    data_keep = this.elements[i].getAttribute('data-keep');
                    if (data_keep ) {
                        var nm = this.elements[i].name;
                        if (!this._hasKey(_params, nm)) {
                            _params.push(nm);
                            if ('' != _get_string)
                                _get_string += '&';
                            _get_string += nm + '=' + _rp(this._get(nm));
                        }
                    }
                }
                
                _uri_item.sort(function(a, b) {
                    a.getAttribute('data-url') - b.getAttribute('data-url');
                });
                
                var item_cnt = _uri_item.length;
                var nm = '';
                for(var i=0; i<item_cnt;i++) {
                    nm = _uri_item[i].name;
                    if ('' != _uri_string)
                        _uri_string += '/';
                    _uri_string += _rp(this._get(nm));
                }

                if('/' != action_url.substring(action_url.length, 1) ) {
                    action_url += '/';
                }
                
                action_url += escape(_uri_string);
                if(_get_string) {
                    action_url += '?' + _get_string;
                }
                
                location.href = action_url;
                
            } else {
                if(target) {
                    rf.target = target; 
                }
                rf.action = action_url;
                rf.method = method_type;
                rf.submit();
            }
            
            return false;
        };
        rf.validate = function() {
            var _elements = [];
            if (!arguments.length) {
                for (var i = 0; i < this.elements.length; i++)
                    _elements.push(this.elements[i]);
            } else {
                var valiArg = ',' + arguments[0] + ',';
                for (var i = 0; i < this.elements.length; i++) {
                    if (this.elements[i].name && valiArg.indexOf(',' + this.elements[i].name + ',') > -1)
                        _elements.push(this.elements[i]);
                }
            }
            return this._validate(_elements);
        };
        rf.val = function() {
            if (arguments.length == 1)
                return this._get(arguments[0]);
            else
                return this._set(arguments[0], arguments[1]);
        };
        rf.foc = function() {
            var _el = this._getEle(arguments[0]);
            if (_el.length > 0) {
                _el[0].focus();
            }
        };
        rf.chk = function() {
            var bool = true;
            if (arguments.length > 1)
                bool = arguments[1];

            var _el = this._getEle(arguments[0]);
            for (var i = 0; i < _el.length; i++) {
                _el[i].checked = bool;
            }
            return rf;
        };
        rf.disab = function() {
            var bool = true;
            if (arguments.length > 1)
                bool = arguments[1];

            var _el = this._getEle(arguments[0]);
            for (var i = 0; i < _el.length; i++) {
                _el[i].disabled = bool;
            }
            return rf;
        };
        rf.text = function() {
            var _returnStr = '';
            if (arguments.length > 0) {
                var _el = this._getEle(arguments[0]);
                for (var i = 0; i < _el.length; i++) {
                    if (this._isSelectBox(_el[i])) {
                        if (_returnStr != '')
                            _returnStr += ',';
                        _returnStr = _el[i].options[_el[i].selectedIndex].text;
                    }
                }
            }
            return _returnStr;
        };
        rf.options = function() {
            if (arguments.length > 0) {
                var _el = this._getEle(arguments[0]);
                if (arguments.length == 1) {
                    for (var i = 0; i < _el.length; i++) {
                        var _len = _el[i].options.length;
                        for (var j = 0; j < _len; j++) {
                            _el[i].options[0] = null;
                        }
                    }
                } else if (arguments.length == 2) {
                    for (var i = 0; i < _el.length; i++) {
                        var idx = arguments[1];
                        if (typeof (idx) != 'number') {
                            idx = this._selectedTextIndex(_el[i], arguments[1]);
                        }
                        _el[i].options[idx] = null;
                    }
                } else if (arguments.length > 2) {
                    for (var i = 0; i < _el.length; i++) {
                        _el[i].options[_el[i].options.length] = new Option(arguments[2], arguments[1]);
                    }
                }
            }
            return rf;
        };
        
        rf.isMatch = function(o, p) {
            var bool = true;
            for (var i = 0; i < p.length; i++) {
                var _p = String(p[i]).replace(/(\[|\])/gim, '').split(':');
                if (o.getAttribute && o.getAttribute(_p[0]) != _p[1]) {
                    bool = false;
                    break;
                }
            }
            return bool;
        };

        rf.toParameterString = function(isUrlEncode) {
            this._beforeSubmit();
            var _returnStr = '';

            if (isUrlEncode == null || isUrlEncode == undefined) {
            	isUrlEncode = false;
            }
            
            var _params = [];
            _returnStr = '';
            for (var i = 0; i < this.elements.length; i++) {
                if (this.elements[i].name) {
                    var nm = this.elements[i].name;
                    if (!this._hasKey(_params, nm)) {
                        _params.push(nm);
                        if (_returnStr)
                            _returnStr += '&';
                        if(isUrlEncode) {
                        	_returnStr += nm + '=' + encodeURIComponent(this._get(nm));
                        } else {
                        	_returnStr += nm + '=' + _rp(this._get(nm));
                        }
                    }
                }
            }
            return _returnStr;
        };
        rf.empty = function(pat) {
            if (pat) {
                if (pat.indexOf('*') > -1)
                    pat = pat.replace(/[*]/gm, "(.+)");
                var p = new RegExp('^' + pat + '$');
                for (var i = 0; i < this.elements.length; i++) {
                    if (this.elements[i].name && p.test(this.elements[i].name))
                        this._set(this.elements[i].name, '');
                }
            }
            return rf;
        };
        rf.clear = function() {
            var len = this.elements.length;
            var removeArray = [];
            for (var i = 0; i < len; i++) {
                if (this.elements[i].getAttribute('data-added') && this.elements[i].getAttribute('data-added') == 'Y') {
                    removeArray.push(this.elements[i]);
                }
            }
            len = removeArray.length;
            for (var i = 0; i < len; i++) {
                this.removeChild(removeArray[i]);
            }
            return rf;
        };
        rf.setParam = function(url, evt) {
            if (url == '')
                return false;
            var params = url.split('&');
            for (var i = 0; i < params.length; i++) {
                var param = params[i].split('=');
                if (param.length != 2)
                    continue;
                var nm = param[0];
                var vals = param[1].split(',');
                for (var j = 0; j < vals.length; j++) {
                    if (evt) {
                        $('input[name="' + nm + '"][value="' + vals[j] + '"]').trigger(evt);
                    } else {
                        this.val(nm, vals[j]);
                    }
                }
            }
        };

        return rf;
    };

    $.jHelper = {
        format : {
            DEFAULT_DATE_FORMAT : 'yyyy-MM-dd'
        },
        form : $.form,
        validator : $.validator,
        ajax : function(o) {

            console.log('ajax call url : ' + o.url);

            if (!o.type)
                o.type = 'post';
            if (!o.dataType)
                o.dataType = 'json';
            if (o.success) {
                var _succ = o.success;
                o.success = function(r) {
                    _succ.call(this, r);
                };
            } else {
                o.success = function(r) {
                };
            }
            if (o.error) {
                var _err = o.error;
                o.error = function(r) {
                    _err.call(this, r);
                };
            } else {
                o.error = function(r) {
                   /* var resMsg = r.responseText;
                    resMsg = $.util.trim(resMsg);
                    alert(resMsg);
                    throw resMsg;*/
                    console.log(r);
                    throw r;
                };
            }
            if (o.data) {
                o.data = o.data + '&ajaxQuery=1';
            }

            return $.ajax(o);
        },

        util : {
        	getTimestamp:function() {
        		return getTimeStamp(false);
        	},
            getTimeStamp:function(includeMillis) {
            	if (includeMillis != null && includeMillis == false) {
            		return Math.round(+new Date()/1000); //10자리
            		
            	} else {
            		return new Date().getTime(); //13자리 밀리세컨드 포함
            	}
            },
            /*
             * ajax 공통 함수
             * 
             * @param curl 호출 주소
             * @param params 주소로 넘겨줄 값 생략 가능,
             * @param call_success 호출 성공 시 실행할 콜백함수 생략가능하며 생략시 결과 반환
             * @param call_error 호출 오류 시 실행할 콜백함수 생략가능하며 생략시 결과 반환
             * @param method 파라미터 전송 타입 생략시 post
             * @param async_mode  비동기 여부
             * @return 콜백함수 생략 시 결과 반환 
             */
            remotecall : function(curl, params, call_success, call_error, method, async_mode, data_type) {
                var rtnVal = false;
                
                if (!method) {
                    method = 'post';
                }
                if(!async_mode) {
                    async_mode = false;
                }
                if(!data_type) {
                    data_type = 'json';
                }
                $.jHelper.ajax({
                    type : method,
                    dataType : data_type,
                    url : curl,
                    async : async_mode,
                    success : function(r) {
                       if(!call_success) {
                           rtnVal  = r;
                       } else {
                           call_success(r);
                       }
                    },
                    error : function(r) {
                        if(call_error) {
                            call_error(r);
                        } else {
                            alert('서버오류가 발생하였습니다. 콘솔 로그를 확인하십시오.');
                            console.log(r);
                        }
                    },
                    data : params
                });
                return rtnVal;
            },
            /*
             * ajax 업로드 함수 
             * 
             * @param curl 호출 주소
             * @param $frm $.from('form name') 개체 ,
             * @param call_success 호출 성공 시 실행할 콜백함수
             * @param call_error 호출 오류 시 실행할 콜백함수 생략가능
             */
            remoteUpload : function(curl, $frm, call_success, call_error) {
                var formData = new FormData($frm);
                $.ajax({
                    url: curl,
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(call_success) {
                            call_success(data);
                        }
                    },
                    error : function(r) {
                        if(call_error) {
                            call_error(r);
                        } else {
                            alert('서버오류가 발생하였습니다. 콘솔 로그를 확인하십시오.');
                            console.log(r);
                        }
                    }
                  });  
            },
            _roundPoint : function() {
                var tmp = arguments[0];
                tmp = tmp * Math.pow(10, arguments[1]);
                tmp = Math.round(tmp);
                return tmp / Math.pow(10, arguments[1]);
            },
            _rightPad : function() {
                return String(arguments[0]) + String(arguments[1]);
            },
            _rightPadLoop : function() {
                var a = 'number' == typeof arguments[1] ? arguments[1] : this.toInt(arguments[1]);
                var _strTmp = arguments[0];
                if (_strTmp.length < a)
                    for (var i = arguments[0].length; i < a; i++)
                        _strTmp = this._rightPad(_strTmp, arguments[2]);
                return _strTmp;
            },
            _leftPad : function() {
                return String(arguments[1]) + String(arguments[0]);
            },
            _leftPadLoop : function() {
                var a = 'number' == typeof arguments[1] ? arguments[1] : this.toInt(arguments[1]);
                var _strTmp = arguments[0];
                if (_strTmp.length < a)
                    for (var i = arguments[0].length; i < a; i++)
                        _strTmp = this._leftPad(_strTmp, arguments[2]);
                return _strTmp;
            },
            replaceAll : function(str, str_asis, str_tobe) {
                return str.split(str_asis).join(str_tobe);
            },
            encodeParam : function(str) {
                return str.replace(/[&]/gm, '%26').replace(/[+]/gm, '%2B');
            },
            numberOnly : function(str) {
                return str.replace(/[^0-9]/gim, '');
            },
            ratioNumberOnly : function(str) {
                return str.replace(/[^0-9\.]/gim, '');
            },
            removeFirstZero : function(str) {
                return str.replace(/^0+/gim, '');
            },
            removeTag : function(str) {
            	return str.replace(/(<([^>]+)>)/gi, "");
            },
            getDayOfWeek : function(ymdStr) {
                if (!$.validator.isValidYMD(ymdStr)) {
                    return '';
                }

                
                var week = new Array('일', '월', '화', '수', '목', '금', '토');

                var yyyy = ymdStr.substring(0, 4);
                var mm = ymdStr.substring(4, 6);
                var dd = ymdStr.substring(6, 8);

                var d = new Date(yyyy, mm - 1, dd);

                return week[d.getDay()];
            },
            lowerCase : function(val) {
                return val ? val.toLowerCase() : '';
            },
            upperCase : function(val) {
                return val ? val.toUpperCase() : '';
            },
            isEmpty : function(val) {
                val = this.trim(String(val));
                return (val == null || val == undefined || val == 'null' || val == 'undefined' || val == '') ? true : false;
            },
            roundPoint : function() {
                if (typeof arguments[0] == 'string') {
                    if (arguments[0] == '')
                        arguments[0] = '0';
                    arguments[0] = parseFloat(arguments[0].replace(/[^-0-9.]/g, ''));
                }
                if (arguments.length == 2)
                    return this._roundPoint(arguments[0], arguments[1]);
                else
                    return Math.round(arguments[0]);
            },
            toInt : function(str) {
                if (typeof str == 'number')
                    return str;
                return parseInt(String(str).replace(/[^-0-9.]/g, '') || 0, 10);
            },
            toFloat : function() {
                return parseFloat(arguments[0].replace(/[^-0-9.]/g, ''));
            },
            trim : function() {
                return String(arguments[0]).replace(/(^\s*)|(\s*$)/g, '');
            },
            ltrim : function() {
                return String(arguments[0]).replace(/(^\s*)/g, '');
            },
            rtrim : function() {
                return String(arguments[0]).replace(/(\s*$)/g, '');
            },
            equals : function() {
                if (arguments[0] == arguments[1])
                    return true;
                else
                    return false;
            },
            append : function() {
                if (arguments.length > 1) {
                    var _strTmp = arguments[0];
                    for (var i = 1; i < arguments.length; i++)
                        _strTmp = _strTmp + arguments[i];
                    return _strTmp;
                } else
                    return arguments[0];
            },
            rightPad : function() {
                if (arguments.length == 2)
                    return this._rightPad(arguments[0], arguments[1]);
                else if (arguments.length == 3)
                    return this._rightPadLoop(arguments[0], arguments[1], arguments[2]);
                else
                    return arguments[0];
            },
            leftPad : function() {
                if (arguments.length == 2)
                    return this._leftPad(arguments[0], arguments[1]);
                else if (arguments.length == 3)
                    return this._leftPadLoop(arguments[0], arguments[1], arguments[2]);
                else
                    return arguments[0];
            },
            getChars : function() {
                arguments[0] = String(arguments[0]);
                var b = new Array();
                for (var i = 0; i < arguments[0].length; i++)
                    b[i] = arguments[0].charAt(i);
                return b;
            },
            reverse : function() {
                var t1 = this.getChars(arguments[0]), tmp = '';
                for (var i = t1.length - 1; i >= 0; i--)
                    tmp = this.append(tmp, t1[i]);
                return tmp;
            },
            lastIndexOf : function() {
                arguments[0] = String(arguments[0]);
                var keyLen = arguments[1].length, len = arguments[0].length, siht = this.reverse(arguments[0]), yek = this.reverse(arguments[1]), idx = -1;
                for (var i = 0; i < len; i++) {
                    if (siht.substring(i, i + keyLen) == yek) {
                        idx = i + keyLen;
                        break;
                    }
                }
                if (idx > -1)
                    idx = len - idx;
                return idx;
            },
            dateFormat : function() {
                if ($.jHelper.util.isEmpty(arguments[0]))
                    return '';
                else {
                    if (arguments[0] instanceof Date) {
                        var result = '';
                        result += String(arguments[0].getFullYear());
                        result += this.leftPad(String(arguments[0].getMonth() + 1), 2, '0');
                        result += this.leftPad(String(arguments[0].getDate()), 2, '0');
                        result += ' ';
                        result += this.leftPad(String(arguments[0].getHours()), 2, '0');
                        result += this.leftPad(String(arguments[0].getMinutes()), 2, '0');
                        result += this.leftPad(String(arguments[0].getSeconds()), 2, '0');
                        if (arguments[1])
                            return this.dateFormat(result, arguments[1]);
                        else
                            return result;
                    } else {
                        var tmpDt = String(arguments[0]).replace(/[^0-9]/gi, '');
                        var format = $.jHelper.format.DEFAULT_DATE_FORMAT;
                        if (arguments.length > 1)
                            format = arguments[1];
                        var _dt = new Date();
                        var year = tmpDt.length >= 4 ? tmpDt.substring(0, 4) : String(_dt.getFullYear());
                        var month = tmpDt.length >= 6 ? tmpDt.substring(4, 6) : this.leftPad(String(_dt.getMonth() + 1), 2, '0');
                        var date = tmpDt.length >= 8 ? tmpDt.substring(6, 8) : this.leftPad(String(_dt.getDate()), 2, '0');
                        var hours = tmpDt.length >= 10 ? tmpDt.substring(8, 10) : this.leftPad(String(_dt.getHours()), 2, '0');
                        var minutes = tmpDt.length >= 12 ? tmpDt.substring(10, 12) : this.leftPad(String(_dt.getMinutes()), 2, '0');
                        var seconds = tmpDt.length >= 14 ? tmpDt.substring(12, 14) : this.leftPad(String(_dt.getSeconds()), 2, '0');
                        var yearCount = 0, monthCount = 0, dateCount = 0, hourCount = 0, minCount = 0, secCount = 0;
                        for (var i = 0; i < format.length; i++) {
                            var str = format.charAt(i);
                            if (str == 'y')
                                yearCount++;
                            if (str == 'M')
                                monthCount++;
                            if (str == 'd')
                                dateCount++;
                            if (str == 'H' || str == 'h')
                                hourCount++;
                            if (str == 'm')
                                minCount++;
                            if (str == 's')
                                secCount++;
                        }
                        format = format.replace(/[y]+/g, String(year).substring(String(year).length - yearCount));
                        format = format.replace(/[M]+/g, String(month).substring(String(month).length - monthCount));
                        format = format.replace(/[d]+/g, String(date).substring(String(date).length - dateCount));
                        format = format.replace(/[h|H]+/g, String(hours).substring(String(hours).length - hourCount));
                        format = format.replace(/[m]+/g, String(minutes).substring(String(minutes).length - minCount));
                        format = format.replace(/[s]+/g, String(seconds).substring(String(seconds).length - secCount));
                        return format;
                    }
                }
            },
            timestampToDate : function() {
            	if ($.jHelper.util.isEmpty(arguments[0]))
            		return '';
            	var tDate = new Date(arguments[0]);
            	return tDate;
            },
            numberFormat : function() {
                if ($.jHelper.util.isEmpty(arguments[0]))
                    return '';
                arguments[0] = String(arguments[0]);
                var temp = String(arguments[0]), format = '###,###,###,###,###,###,###,###,###', a = 0, b = 3;
                var spr = arguments.length > 1 ? arguments[1] : 2;
                if (arguments.length > 2 && arguments[0].indexOf('.') > -1)
                    arguments[0] = arguments[0].substring(0, arguments[0].indexOf('.') + spr + 1);
                var tmpStr = String(arguments[0]).replace(/[^-0-9.]/g, '');
                if ('' == tmpStr)
                    tmpStr = '0';
                var str = String(this._roundPoint(this.toFloat(tmpStr), spr)).split('.');
                var reformat = this.reverse(format);
                var rethis = this.reverse(str[0]);
                var flen = format.split(',');
                for (var i = 0; i < flen.length; i++) {
                    reformat = reformat.replace(/[#]{1,}/, rethis.substring(a, b));
                    a = a + 3, b = b + 3;
                }
                temp = this.reverse(reformat).replace(/,{1,}/, '').replace(/-,/g, '-');

                if (str[1]) {
                    temp = this.append(temp, '.');
                    temp = this.append(temp, str[1]);
                }

                if (arguments[0] && arguments[0].indexOf('.') > -1) {
                    var _su = (temp.indexOf('.') > -1) ? temp.substring(temp.indexOf('.') + 1).length : 0;
                    for (var i = _su; i < spr; i++) {
                        if (temp.indexOf('.') == -1)
                            temp = String(temp) + '.';
                        temp = String(temp) + '0';
                    }

                }
                return temp;
            },
            cut : function(str, len) {
                if (str.length > len) {
                    str = str.substring(0, len - 1) + '..';
                }
                return str;
            },
            removeHTML : function(str) {
                return str ? str.replace(/<(\/|!)?([-a-zA-Z]*)(\\s[a-zA-Z]*=[^>]*)?(\\s)*(\/)?>/gim, '') : '';
            },
            winOpen : function(_url, _target, _option) {
                _target = _target || '_self';
                _option = _option || '';
                
                _option = _option.toLowerCase();
                if(_option) {
                    if(_option.indexOf('status=')<0) {
                        _option = _option + ',status=no';
                    }

                    if(_option.indexOf('top=')<0 && _option.indexOf('left=')<0 ) {
                        var window_left = (screen.width-640)/2;
                        var window_top = (screen.height-480)/2; 
                        _option = _option + ',top=' + window_top + ',left=' + window_left ;
                    }
                }
                
                var win = window.open(_url, _target, _option);
                try {
                    win.focus();
                } catch (e) {
                }
            },
            autoNextFocus : function(e) {
                var fieldNm = arguments[0];
                var len = arguments[1];
                var nextFieldNm = arguments[2];
                var keyCode = (window.event) ? event.keyCode : e.which;
                if (keyCode != 9 && keyCode != 16 && keyCode != 8 && keyCode != 39 && keyCode != 37 && keyCode != 46) {
                    var _val = $('input[name="' + fieldNm + '"]').val();
                    if (!$.util.isEmpty(_val) && _val.length == len) {
                        $('input[name="' + nextFieldNm + '"]').focus();
                    }
                    ;
                }
                ;
            },
            /**
             * input 필드에 천단위 콤마
             */
            formatTextfield : function(obj) {
                obj.value = $.util.numberFormat(obj.value, 0);
            },
            filterOnlyNumber : function (str) {
                return str.replace(/[^0-9]/gi,'');
            },
            filterOnlyAlphabet : function (str) {
                return str.replace(/[^a-z_]/gi,'');
            },
            filterOnlyNumberAndAlaphabet : function (str) {
                return str.replace(/[^a-z0-9_]/gi,'');
            },
            filterSpecialChar : function (str) {
                //var check = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,16}$/;
                return str.replace(/[!@#$%^&*+=]/gi, '');
            },
            /*
             * 소스로 지정한 필드의 값으로 대상들의 값을 모두 세팅
             * equalTo(폼이름, 소스필드이름, 대상필드이름1, 대상필드이름2, 대상필드이름3....);
             * 
             */
            equalTo : function() {

                if(arguments.length < 3) {
                    return;
                }
                var cnt = arguments.length;
                
                var $frm = $.form(arguments[0]);
                var src_name = arguments[1];
                var src_value = $frm.val(src_name);
                
                for(i=2; i< cnt; i++) {
                    $frm.val(arguments[i], src_value);
                }

            }
        }, 
        cookie : {
        	set : function(name, value, expireDay) {
        		var expire = new Date();
        		expire.setDate(expire.getDate() + expireDay);
        		cookies = name + '=' + escape(value) + '; path=/ ';
        		
        		if (typeof expireDay != 'undefined') 
        			cookies += '; expires=' + expire.toGMTString() + '; ';
        		document.cookie = cookies;
        	},
        	get : function(name) {
        		name = name + '=';
        		var data = document.cookie;
        		var start = data.indexOf(name);
        		var value = '';
        		
        		if(start != -1) {
        			start += name.length;
        			var end = data.indexOf(';', start);
        			if(end == -1)
        				end = data.length;
        			value = data.substring(start, end);
        		}
        		return unescape(value);
        	},
        	remove : function(name) {
        		var today = new Date();
        		today.setDate(today.getDate() - 1);
        		document.cookie = name + '=; path=/; expires=' + today.toGMTString() + ';';
        	}
        }
    };

    $.util = $.jHelper.util;
    $.cookie = $.jHelper.cookie;

})();

$(document).ready(function(){ 

});