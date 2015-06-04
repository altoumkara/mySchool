
<!-- hide script from old browsers

$(document).ready(function(){
  //show all home page menu item on mouse click
  show_home_menu();

  //show all profile page menu item on mouse click
  show_profile_menu();
})

/*show all home menu by clicking the menu bar in front of the home tab*/
function show_home_menu(){
	$("#menu-home").click(function(){
		$("#all-home-menu").slideToggle();
	});
}


/*show all profile menu by clicking the menu bar in front of the home tab*/
function show_profile_menu(){
	$("#menu-profile").click(function(){
		$("#all-profile-menu").slideToggle();
	});
}