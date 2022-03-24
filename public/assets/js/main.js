
// initialization of Popovers
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

// initialization of Tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// helper for adding on all elements multiple attributes
function setAttributes(el, options) {
  Object.keys(options).forEach(function(attr) {
    el.setAttribute(attr, options[attr]);
  })
}

// activate popovers
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

// activate tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

function copyCode(el) {
    const selection = window.getSelection();
    const range = document.createRange();
    const textToCopy = el.nextElementSibling;
    range.selectNodeContents(textToCopy);
    selection.removeAllRanges();
    selection.addRange(range);
    const successful = document.execCommand('copy');
    window.getSelection().removeAllRanges()
    if (!el.parentElement.querySelector('.alert')) {
      var alert = document.createElement('div');
      alert.classList.add('alert', 'alert-success', 'position-absolute', 'top-0', 'border-0', 'text-white', 'w-25', 'end-0', 'start-0', 'mt-2', 'mx-auto', 'py-2');
      alert.style.transform = 'translate3d(0px, 0px, 0px)'
      alert.style.opacity = '0';
      alert.style.transition = '.35s ease';
      setTimeout(function() {
        alert.style.transform = 'translate3d(0px, 20px, 0px)';
        alert.style.setProperty("opacity", "1", "important");
      }, 100);
      alert.innerHTML = "Code successfully copied!";
      el.parentElement.appendChild(alert);
      setTimeout(function() {
        alert.style.transform = 'translate3d(0px, 0px, 0px)'
        alert.style.setProperty("opacity", "0", "important");
      }, 2000);
      setTimeout(function() {
        el.parentElement.querySelector('.alert').remove();
      }, 2500);
    }
  }
  
  // End copy code function
  
  // Returns a function, that, as long as it continues to be invoked, will not
  // be triggered. The function will be called after it stops being called for
  // N milliseconds. If `immediate` is passed, trigger the function on the
  // leading edge, instead of the trailing.
  
  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this,
        args = arguments;
      clearTimeout(timeout);
      timeout = setTimeout(function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      }, wait);
      if (immediate && !timeout) func.apply(context, args);
    };
  };

  (function($) {
    "use strict";

    document.addEventListener('livewire:load', function() {

        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message);
        });

    });

  })(jQuery);
    
    window.livewire.on('notif_alert', param => {
      Swal.fire({
      position: param['position'],
      icon: param['type'],
      title: param['message'],
      showConfirmButton: param['confirm_button'],
      timer: param['timer']
    })
  });

  window.livewire.on('alert', param => {
    var config = {
      position  : 'center',
    };

    if('title' in param)
      config['title'] = param['title'];
    if('type' in param)
      config['icon'] = param['type'];
    if('message' in param)
      config['html'] = param['message'];
    if('showConfirmButton' in param)
      config['showConfirmButton'] = param['showConfirmButton'];
    if('timer' in param)
      config['timer'] = param['timer'];

    Swal.fire(config);
  });

  window.livewire.on('alert_link', param => {
    Swal.fire({
        position         : 'center',
        icon             : param['type'],
        html             : param['message'],
        title            : param['title'],
        showConfirmButton: true,
        allowOutsideClick: false,
    }).then((result) => {
        if(result.value){
          if('redirect' in param){
            window.location = param['redirect'];                       
          }else{
            window.location.reload();                       
          }
        }
    });
  });


