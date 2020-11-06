/**
 * PRO.js
 * 
 * @author Linus Benkner
 * @version 1.0
 */

function __extend(func, props) {
    for (var prop in props) {
        if (props.hasOwnProperty(prop)) {
            func[prop] = props[prop];
        }
    }
    return func;
}
var $ = __extend(function(data) {
    var element = null;
    var elements = [];
    var multiple = true;
    var cache = {};
    elements = (
        data instanceof Object
        ? 
        data
        :
        document.querySelectorAll(data)
    );
    element = (
        elements instanceof NodeList
        ?
        elements[0]
        :
        elements
    );
    multiple = elements.length > 1;
    /**
     * Get the Element
     */
    getElement = function() { 
        return element; 
    };

    /**
     * Get the Elements
     */
    getElements = function() { 
        return elements; 
    };

    /**
     * Check if has class
     */
    hasClass = function(name) {
        return (element.classList.contains(name));
    }

    /**
     * Add a class
     */
    addClass = function(name) {
        each((el, index) => {
            if(!el.classList.contains(name)) el.classList.add(name);
        });
    };

    /**
     * Remove a class
     */
    removeClass = function(name) {
        each((el, index) => {
            if(el.classList.contains(name)) el.classList.remove(name);
        });
    };

    /**
     * Toggle class
     */
    toggleClass = function(name) {
        each((el, index) => {
            if(el.classList.contains(name)) el.classList.remove(name);
            else el.classList.add(name);
        });
    };

    /**
     * Loop through each element
     */
    each = function(callback) {
        if(elements instanceof NodeList){
            elements.forEach((el, index) => {
                callback(el, index);
            });
        }else {
            callback(element, 0)
        }
    };

    /**
     * Get and set data attributes
     */
    attr = function(name, value) {
        if(value === undefined){
            return element.getAttribute(name);
        }else {
            each((el, index) => {
                el.setAttribute(name, value);
            });
        }
    };

    /**
     * Set / Get HTML
     */
    html = function(content){
        if(content === undefined){
            return element.innerHTML;
        }else {
            each((el, index) => {
                el.innerHTML = content;
            });
        }
    };

    /**
     * Set / Get Text
     */
    text = function(content){
        if(content === undefined){
            return element.innerText;
        }else {
            each((el, index) => {
                el.innerText = content;
            });
        }
    };

    /**
     * Add Event Listener
     */
    on = function(data1, data2, data3){
        var event = data1;
        var selector = "";
        var callback = null;
        if(data3 === undefined){
            callback = data2;
        }else {
            selector = data2;
            callback = data3;
        }
        each((el, index) => {
            el.addEventListener(event, (ev) => {
                if(selector === ""){
                    callback(ev);
                }else {
                    var objs = document.querySelectorAll(selector);
                    objs.forEach((element, index) => {
                        if(element == ev.target){
                            callback(ev);
                        }
                    });
                }
            });
        });
    };

    /**
     * Append
     */

    /**
     * Prepend
     */

    /**
     * CSS (also accept objects)
     */

    /**
     * Value
     */
    value = function(data){
        if(data === undefined){
            return element.value;
        }else {
            each((el, index) => {
                el.value = data;
            });
        }
    }

    /**
     * ReplaceWith
     */

    /**
     * Remove
     */
    remove = function() {
        each((el, index) => {
            el.remove();
        });
    };

    /**
     * Click
     */
    click = function(handler) {
        each((el, index) => {
            el.addEventListener('click', (event) => {
                handler(event);
            });
        });
    };

    /**
     * Input
     */
    input = function(handler) {
        each((el, index) => {
            el.addEventListener('input', (event) => {
                handler(event);
            });
        });
    };

    /**
     * Parent
     */
    parent = function() {
        return element.parentElement;
    };

    /**
     * Hover
     */
    hover = function(func1, func2){
        on('mouseover', (event) => {
            func1('enter');
        });
        on('mouseout', (event) => {
            if(func2 === undefined){
                finc1('leave');
            }else {
                func2('leave');
            }
        });
    };

    /**
     * Hide
     */
    hide = function() {
        each((el, index) => {
            el.style.display = 'none';
        });
    };

    /**
     * Show
     */
    show = function() {
        each((el, index) => {
            el.style.display = 'block';
        });
    };

    /**
     * Toggle
     */
    hide = function() {
        each((el, index) => {
            if(el.style.display === 'none') el.style.display = 'none';
            else el.style.display = 'block';
        });
    };

    /**
     * Slide Up
     */
    slideUp = function(time = 300) {
        each((el, index) => {

        });
    };

    /**
     * Slide Down
     */
    slideDown = function(time = 300) {
        each((el, index) => {

        });
    };

    /**
     * SlideToggle
     */

    /**
     * Load
     */

    /**
     * Fade out
     */
    fadeOut = function(time = 300){
        each((el, index) => {
            el.style.opacity = 1;
            var timer = setInterval(() => {
                if(el.style.opacity == 0){
                    clearInterval(timer);
                }else {
                    el.style.opacity = (parseFloat(el.style.opacity) - (1 / 100));
                }
            }, time / 100);
        });
    }

    /**
     * Fade In
     */
    fadeIn = function(time = 300){
        each((el, index) => {
            el.style.opacity = 0;
            var timer = setInterval(() => {
                if(el.style.opacity == 1){
                    clearInterval(timer);
                }else {
                    el.style.opacity = (parseFloat(el.style.opacity) + (1 / 100));
                }
            }, time / 100);
        });
    }

    /**
     * Fade toggle
     */
    fadeToggle = function(time = 300) {
        each((el, index) => {
            if(el.style.opacity == 0){
                fadeIn(time);
            }else {
                fadeOut(time);
            }
        });
    }

    /**
     * Return this
     */
    return this;
}, {
    ajax: function(url, data){
        
        var successFunc = null;
        var errorFunc = null;

        if(data.success !== undefined) successFunc = data.success;
        if(data.error !== undefined) errorFunc = data.error;

        var http = new XMLHttpRequest();
        var params = $.serialize(data.data);
        http.open(data.method, url, true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.onreadystatechange = function() {
            if(http.readyState == 4) {
                if(http.status === 200){
                    if(successFunc !== null){
                        successFunc(http.responseText);
                    }
                }else {
                    if(errorFunc !== null){
                        errorFunc(http.responseText);
                    }
                }
            }
        }
        http.send(params);

    },
    serialize: function(obj, prefix) {
        var str = [],
            p;
        for (p in obj) {
            if (obj.hasOwnProperty(p)) {
                var k = prefix ? prefix + "[" + p + "]" : p,
                    v = obj[p];
                str.push((v !== null && typeof v === "object") ?
                    $.serialize(v, k) :
                    encodeURIComponent(k) + "=" + encodeURIComponent(v));
            }
        }
        return str.join("&");
    },
});