// Change header class on scroll
$(window).scroll(function() {
    if ($(this).scrollTop() > 150){  
        $('.header-logo').addClass("scroll");
    }
    else{
        $('.header-logo').removeClass("scroll");
    }
});

// Time out after no mouse activity.
//Sends user to home screen where session will have timed out a few seconds before.
//Login screen will display
setTimeout(onUserInactivity, 1000 * 490)
function onUserInactivity() {
   window.location.href = "index.php"
}

// Live search - search drug table and show result as user types
$(document).ready(function(){
	$('.search-box input[type="text"]').on("keyup input", function(){
		/* Get input value on change */
		var inputVal = $(this).val();
		var resultDropdown = $(this).siblings(".result");
		if(inputVal.length){
			$.get("config/live-search.php", {term: inputVal}).done(function(data){
				// Display the returned data in browser
				resultDropdown.html(data);
			});
		} else {
				resultDropdown.empty();
		}
	});
			
	// Set search input value on click of result item
	$(document).on("click", ".result p", function(){
		$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
		$(this).parent(".result").empty();
	});
});

//Switch between cd and high strength cds - cd order page

function openDosage(evt, doseName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("dosage-select");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" dosage-btn-selected", "");
  }
  document.getElementById(doseName).style.display = "block";
  evt.currentTarget.className += " dosage-btn-selected";
}

//Switch between stock order data 7/14/30 days tabs  - stock order data - admin page

function openDays(evt, daysName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("ward-order-data-wrapper");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" days-btn-selected", "");
  }
  document.getElementById(daysName).style.display = "flex";
  evt.currentTarget.className += " days-btn-selected";
}