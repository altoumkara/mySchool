
<!-- hide script from old browsers


  $(document).ready(function(){
    //show the only the specific kind of electronc selected
     select_kind();
    //show only the version of phone related to the phone selected
    select_phone_kind();
    //show only the version computer related to the computer selected
    select_computer_kind();
    //show only the version computer related to the computer selected
    select_tv_kind();
    //show only the version electronic related to the electeronic selected
    select_electro_model();

  });

//show only the version electronic related to the electeronic selected
function select_electro_model(){
 $("#electroName").click(function() {
   if($("#electroName").val() === "modelOther"){
     $("input#eName-other").show(); //show the input element for entering the electronic model manually
    }else{
    	$("input#eName-other").hide(); //hide the input element for entering the electronic MODEL manually
    };
  });
}









//show only the version of phone related to the phone selected
function select_phone_kind(){
 $("#electroBrand").click(function() {
    var $el = $("#electroName");
    var firstOption = $("#electroName option:first-child");
   if(($("#electroKind").val() === "phone")&&($("#electroBrand").val() === "iphone")){
   	 $("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
     var iphone_version = {
      "iphone1" : "Iphone 1st generation", "iphone3g" : "Iphone 3G", "iphone3gs" : "Iphone 3GS", 
      "iphone4" : "Iphone 4", "iphone4s" : "Iphone 4S","iphone5": "Iphone 5", "iphone5c": "Iphone 5C",
      "iphone6": "Iphone 6", "modelOther": "other"
     };
     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(iphone_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "phone")&&($("#electroBrand").val() === "samsung")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      var samsung_phone_version = {
		"Template_Samsung_Galaxy_S" : "Template:Samsung Galaxy S",
		"Template_Samsung_phones" : "Template:Samsung phones",
		"Template_Samsung_smartphone" : "Template:Samsung smartphone",
		"Samsung_SGH-A167" : "Samsung SGH-A167",
		"Samsung_SPH-A303" : "Samsung SPH-A303",
		"Samsung_SPH-A460" : "Samsung SPH-A460",
		"Samsung_SPH-A503" : "Samsung SPH-A503",
		"Samsung_SGH-A561" : "Samsung SGH-A561",
		"Samsung_SPH-A640" : "Samsung SPH-A640",
		"Samsung_SGH-A707" : "Samsung SGH-A707",
		"Samsung_SPH-A900" : "Samsung SPH-A900",
		"Samsung_MM-A920" : "Samsung MM-A920",
		"Samsung_MM-A940" : "Samsung MM-A940",
		"Samsung_Alias" : "Samsung Alias",
		"Samsung_Alias_2" : "Samsung Alias 2",
		"Samsung_Anycall" : "Samsung Anycall",
		"Anycall_5200" : "Anycall 5200",
		"Anycall_Haptic" : "Anycall Haptic",
		"Samsung_B3210" : "Samsung B3210",
		"Samsung_B3410" : "Samsung B3410",
		"Samsung_B7300" : "Samsung B7300",
		"Samsung_B7610" : "Samsung B7610",
		"Samsung_Behold_II" : "Samsung Behold II",
		"Samsung_Bresson" : "Samsung Bresson",
		"Samsung_Brightside" : "Samsung Brightside",
		"Samsung_SGH-C417" : "Samsung SGH-C417",
		"Samsung_Captivate_Glide" : "Samsung Captivate Glide",
		"Samsung_Champ" : "Samsung Champ",
		"Samsung_Chat_335" : "Samsung Chat 335",
		"Samsung_B5310" : "Samsung B5310",
		"Samsung_Corby" : "Samsung Corby",
		"Samsung_Corby_Speed" : "Samsung Corby Speed",
		"Samsung_SGH-D500" : "Samsung SGH-D500",
		"Samsung_SGH-D600" : "Samsung SGH-D600",
		"Samsung_SGH-D807" : "Samsung SGH-D807",
		"Samsung_SGH-D900" : "Samsung SGH-D900",
		"Danger_Hiptop" : "Danger Hiptop",
		"Samsung_E1107" : "Samsung E1107",
		"Samsung_E1120" : "Samsung E1120",
		"Samsung_E1170" : "Samsung E1170",
		"Samsung_E1195" : "Samsung E1195",
		"Samsung_E2130" : "Samsung E2130",
		"Samsung_SGH-E250" : "Samsung SGH-E250",
		"Samsung_SGH-E250i" : "Samsung SGH-E250i",
		"Samsung_E3210" : "Samsung E3210",
		"Samsung_SGH-E715" : "Samsung SGH-E715",
		"Samsung_SGH-E900" : "Samsung SGH-E900",
		"Samsung_SGH-F210" : "Samsung SGH-F210",
		"Samsung_SGH-F480" : "Samsung SGH-F480",
		"Samsung_SGH-F700" : "Samsung SGH-F700",
		"Samsung_SGH-G600" : "Samsung SGH-G600",
		"Samsung_SGH-G800" : "Samsung SGH-G800",
		"Samsung_SGH-G810" : "Samsung SGH-G810",
		"Samsung_Galaxy" : "Samsung Galaxy",
		"Samsung_Intensity_(series)" : "Samsung Intensity (series)",
		"Samsung_Galaxy_(original)" : "Samsung Galaxy (original)",
		"Samsung_Galaxy_5" : "Samsung Galaxy 5",
		"Samsung_Galaxy_Chat" : "Samsung Galaxy Chat",
		"Samsung_Galaxy_Core" : "Samsung Galaxy Core",
		"Samsung_Galaxy_J" : "Samsung Galaxy J",
		"Samsung_Galaxy_Express" : "Samsung Galaxy Express",
		"Samsung_Galaxy_Express_2" : "Samsung Galaxy Express 2",
		"Samsung_Galaxy_Fame" : "Samsung Galaxy Fame",
		"Samsung_Galaxy_Fit" : "Samsung Galaxy Fit",
		"Samsung_Galaxy_Grand" : "Samsung Galaxy Grand",
		"Samsung_Galaxy_Win" : "Samsung Galaxy Win",
		"Samsung_Galaxy_Grand_2" : "Samsung Galaxy Grand 2",
		"Samsung_Galaxy_Mini" : "Samsung Galaxy Mini",
		"Samsung_Galaxy_Mini_2" : "Samsung Galaxy Mini 2",
		"Galaxy_Nexus" : "Galaxy Nexus",
		"Samsung_Galaxy_Note_(original)" : "Samsung Galaxy Note (original)",
		"Samsung_Galaxy_Note_II" : "Samsung Galaxy Note II",
		"Samsung_Galaxy_Note_3" : "Samsung Galaxy Note 3",
		"Samsung_Galaxy_Note_3_Neo" : "Samsung Galaxy Note 3 Neo",
		"Samsung_Galaxy_Portal" : "Samsung Galaxy Portal",
		"Samsung_Galaxy_R" : "Samsung Galaxy R",
		"Samsung_Galaxy_S" : "Samsung Galaxy S",
		"Samsung_Galaxy_S_Advance" : "Samsung Galaxy S Advance",
		"Samsung_Galaxy_S_III_Mini" : "Samsung Galaxy S III Mini",
		"Samsung_Galaxy_S_II" : "Samsung Galaxy S II",
		"Samsung_Galaxy_S_Plus" : "Samsung Galaxy S Plus",
		"Samsung_Galaxy_S_series" : "Samsung Galaxy S series",
		"Samsung_Galaxy_Spica" : "Samsung Galaxy Spica",
		"Samsung_Galaxy_Star" : "Samsung Galaxy Star",
		"Samsung_Galaxy_W" : "Samsung Galaxy W",
		"Samsung_Galaxy_Y" : "Samsung Galaxy Y",
		"Samsung_Galaxy_Young" : "Samsung Galaxy Young",
		"Samsung_Gravity_series" : "Samsung Gravity series",
		"Samsung_GT-B7330" : "Samsung GT-B7330",
		"Samsung_Mobile_GT-C3520" : "Samsung Mobile GT-C3520",
		"Samsung_GT-E1150i" : "Samsung GT-E1150i",
		"Samsung_SGH-i300" : "Samsung SGH-i300",
		"Samsung_SPH-i300" : "Samsung SPH-i300",
		"Samsung_SPH-i500" : "Samsung SPH-i500",
		"Samsung_SPH-i550" : "Samsung SPH-i550",
		"Samsung_Galaxy_S_Duos" : "Samsung Galaxy S Duos",
		"Samsung_Galaxy_3" : "Samsung Galaxy 3",
		"Samsung_Galaxy_Ace" : "Samsung Galaxy Ace",
		"Samsung_SGH-i600" : "Samsung SGH-i600",
		"Samsung_SPH-i700" : "Samsung SPH-i700",
		"Samsung_SCH-i760" : "Samsung SCH-i760",
		"Samsung_SCH-i770" : "Samsung SCH-i770",
		"Samsung_GT-i8510" : "Samsung GT-i8510",
		"Samsung_Beam_i8520" : "Samsung Beam i8520",
		"Samsung_i8000" : "Samsung i8000",
		"Samsung_i8910" : "Samsung i8910",
		"Samsung_SGH-i900" : "Samsung SGH-i900",
		"Samsung_Impression" : "Samsung Impression",
		"Samsung_Infuse_4G" : "Samsung Infuse 4G",
		"Samsung_Intercept" : "Samsung Intercept",
		"Samsung_SGH-J700" : "Samsung SGH-J700",
		"Samsung_Konx" : "Samsung Konx",
		"Samsung_SPH-M100" : "Samsung SPH-M100",
		"Samsung_SPH-M300" : "Samsung SPH-M300",
		"Samsung_SGH-M310" : "Samsung SGH-M310",
		"Samsung_SPH-M520" : "Samsung SPH-M520",
		"Samsung_SPH-M620" : "Samsung SPH-M620",
		"Samsung_GT-M7500" : "Samsung GT-M7500",
		"Samsung_M8800" : "Samsung M8800",
		"Samsung_M8910" : "Samsung M8910",
		"Meizu_MX4_Pro" : "Meizu MX4 Pro",
		"Samsung_Minikit" : "Samsung Minikit",
		"Samsung_SPH-N270" : "Samsung SPH-N270",
		"Nexus_S" : "Nexus S",
		"Samsung_Omnia_Series" : "Samsung Omnia Series",
		"Samsung_SGH-P300" : "Samsung SGH-P300",
		"Samsung_SGH-P310" : "Samsung SGH-P310",
		"Samsung_SGH-P520" : "Samsung SGH-P520",
		"Samsung_Pixon" : "Samsung Pixon",
		"Samsung_Pixon12" : "Samsung Pixon12",
		"Samsung_Rant" : "Samsung Rant",
		"Samsung_Replenish" : "Samsung Replenish",
		"Samsung_REX" : "Samsung REX",
		"Samsung_Rugby" : "Samsung Rugby",
		"Samsung_Rugby_Smart" : "Samsung Rugby Smart",
		"Samsung_S5230" : "Samsung S5230",
		"Samsung_S5560" : "Samsung S5560",
		"Samsung_S5600" : "Samsung S5600",
		"Samsung_S5600v" : "Samsung S5600v",
		"Samsung_S8000" : "Samsung S8000",
		"Samsung_Wave_S8500" : "Samsung Wave S8500",
		"Samsung_Wave_II_S8530" : "Samsung Wave II S8530",
		"Samsung_S5560i" : "Samsung S5560i",
		"Samsung_Galaxy_Gio" : "Samsung Galaxy Gio",
		"Samsung_Galaxy_Ace_Plus" : "Samsung Galaxy Ace Plus",
		"Samsung_Ativ_S" : "Samsung Ativ S",
		"Samsung_Exhibit_4G" : "Samsung Exhibit 4G",
		"Samsung_Galaxy_A3" : "Samsung Galaxy A3",
		"Samsung_Galaxy_Ace_2" : "Samsung Galaxy Ace 2",
		"Samsung_Galaxy_Ace_3" : "Samsung Galaxy Ace 3",
		"Samsung_Galaxy_Alpha" : "Samsung Galaxy Alpha",
		"Samsung_Galaxy_Beam_i8530" : "Samsung Galaxy Beam i8530",
		"Samsung_Galaxy_Core_Advance" : "Samsung Galaxy Core Advance",
		"Samsung_Galaxy_Core_LTE" : "Samsung Galaxy Core LTE",
		"Samsung_Galaxy_Mega" : "Samsung Galaxy Mega",
		"Samsung_Galaxy_Note_4" : "Samsung Galaxy Note 4",
		"Samsung_Galaxy_Note_Edge" : "Samsung Galaxy Note Edge",
		"Samsung_Galaxy_Note_series" : "Samsung Galaxy Note series",
		"Samsung_Galaxy_Pocket" : "Samsung Galaxy Pocket",
		"Samsung_Galaxy_Pocket_Duos" : "Samsung Galaxy Pocket Duos",
		"Samsung_Galaxy_Pocket_Neo" : "Samsung Galaxy Pocket Neo",
		"Samsung_Galaxy_Pocket_Plus" : "Samsung Galaxy Pocket Plus",
		"Samsung_Galaxy_Prevail" : "Samsung Galaxy Prevail",
		"Samsung_Galaxy_Round" : "Samsung Galaxy Round",
		"Samsung_Galaxy_S_4G_LTE" : "Samsung Galaxy S 4G LTE",
		"Samsung_Galaxy_S_Duos_2" : "Samsung Galaxy S Duos 2",
		"Samsung_Galaxy_S_III" : "Samsung Galaxy S III",
		"Samsung_Galaxy_S_Relay_4G" : "Samsung Galaxy S Relay 4G",
		"Samsung_Galaxy_S4" : "Samsung Galaxy S4",
		"Samsung_Galaxy_S4_Active" : "Samsung Galaxy S4 Active",
		"Samsung_Galaxy_S4_Mini" : "Samsung Galaxy S4 Mini",
		"Samsung_Galaxy_S4_Zoom" : "Samsung Galaxy S4 Zoom",
		"Samsung_Galaxy_S5" : "Samsung Galaxy S5",
		"Samsung_Galaxy_S5_Mini" : "Samsung Galaxy S5 Mini",
		"Samsung_Galaxy_SL_I9003" : "Samsung Galaxy SL I9003",
		"Samsung_Galaxy_Tab_series" : "Samsung Galaxy Tab series",
		"Samsung_Galaxy_Xcover" : "Samsung Galaxy Xcover",
		"Samsung_Galaxy_Xcover_2" : "Samsung Galaxy Xcover 2",
		"Samsung_Galaxy_Y_DUOS" : "Samsung Galaxy Y DUOS",
		"Samsung_Galaxy_Y_Plus" : "Samsung Galaxy Y Plus",
		"Samsung_Galaxy_Y_Pro_DUOS" : "Samsung Galaxy Y Pro DUOS",
		"Samsung_Gravity" : "Samsung Gravity (original)",
		"Samsung_S7550" : "Samsung S7550",
		"Samsung_S8300" : "Samsung S8300",
		"Samsung_SCH-B450" : "Samsung SCH-B450",
		"Samsung_SCH-B550" : "Samsung SCH-B550",
		"Samsung_SCH-R810" : "Samsung SCH-R810",
		"Samsung_SCH-U740" : "Samsung SCH-U740",
		"Samsung_SCH-U940" : "Samsung SCH-U940",
		"Samsung_SGH_R220" : "Samsung SGH R220",
		"Samsung_SGH-A127" : "Samsung SGH-A127",
		"Samsung_SGH-A177" : "Samsung SGH-A177",
		"Samsung_SGH-A657" : "Samsung SGH-A657 (AT&T)",
		"Samsung_SGH-A767" : "Samsung SGH-A767",
		"Samsung_SGH-A877" : "Samsung SGH-A877",
		"Samsung_SGH-C414" : "Samsung SGH-C414",
		"Samsung_SGH-E700" : "Samsung SGH-E700",
		"Samsung_SGH-i550w" : "Samsung SGH-i550w",
		"Samsung_SGH-i607" : "Samsung SGH-i607",
		"Samsung_SGH-i617" : "Samsung SGH-i617",
		"modelOther": "other"
		};
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(samsung_phone_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "phone")&&($("#electroBrand").val() === "nokia")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      //nokia phones
	 var nokia_phone_version = {
		"Nokia_Lumia_1520" :	"Nokia Lumia 1520",
		"Nokia_Lumia_1520" :	"Nokia Lumia 1520",
		"Nokia_Lumia_930" :	"Nokia Lumia 930",
		"Nokia_Lumia_930" :	"Nokia Lumia 930",
		"Nokia_Lumia_920" :	"Nokia Lumia 920",
		"Nokia_Lumia_920" :	"Nokia Lumia 920",
		"Nokia_Lumia_830" :	"Nokia Lumia 830",
		"Nokia_Lumia_830" :	"Nokia Lumia 830",
		"Nokia_Lumia_1020" :	"Nokia Lumia 1020 ",
		"Nokia_Lumia_1020" :	"Nokia Lumia 1020 ",
		"Nokia_Lumia_800" :	"Nokia Lumia 800",
		"Nokia_Lumia_800" :	"Nokia Lumia 800",
		"Nokia_Lumia_925" :	"Nokia Lumia 925",
		"Nokia_Lumia_925" :	"Nokia Lumia 925",
		"Nokia_Lumia_720" :	"Nokia Lumia 720",
		"Nokia_Lumia_720" :	"Nokia Lumia 720",
		"Nokia_Lumia_900" :	"Nokia Lumia 900",
		"Nokia_Lumia_900" :	"Nokia Lumia 900",
		"Nokia_Lumia_1320" :	"Nokia Lumia 1320",
		"Nokia_Lumia_1320" :	"Nokia Lumia 1320",
		"Nokia_Lumia_730" :	"Nokia Lumia 730",
		"Nokia_Lumia_730" :	"Nokia Lumia 730",
		"Nokia_Lumia_510" :	"Nokia Lumia 510",
		"Nokia_Lumia_510" :	"Nokia Lumia 510",
		"Nokia_E5" :	"Nokia E5",
		"Nokia_E5" :	"Nokia E5",
		"Nokia_Lumia_710" :	"Nokia Lumia 710",
		"Nokia_Lumia_710" :	"Nokia Lumia 710",
		"Nokia_Lumia_638" :	"Nokia Lumia 638",
		"Nokia_Lumia_638" :	"Nokia Lumia 638",
		"Nokia_XL" :	"Nokia XL",
		"Nokia_XL" :	"Nokia XL",
		"Nokia_Lumia_625" :	"Nokia Lumia 625",
		"Nokia_Lumia_625" :	"Nokia Lumia 625",
		"Nokia_Lumia_520" :	"Nokia Lumia 520",
		"Nokia_Lumia_520" :	"Nokia Lumia 520",
		"Nokia_Lumia_525" :	"Nokia Lumia 525",
		"Nokia_Lumia_525" :	"Nokia Lumia 525",
		"Nokia_Lumia_630_Dual_SIM" :	"Nokia Lumia 630 Dual SIM",
		"Nokia_Lumia_630_Dual_SIM" :	"Nokia Lumia 630 Dual SIM",
		"Nokia_Lumia_620" :	"Nokia Lumia 620",
		"Nokia_Lumia_620" :	"Nokia Lumia 620",
		"Nokia_Asha_306" :	"Nokia Asha 306",
		"Nokia_Asha_306" :	"Nokia Asha 306",
		"Nokia_500" :	"Nokia 500",
		"Nokia_500" :	"Nokia 500",
		"Nokia_Asha_302" :	"Nokia Asha 302",
		"Nokia_Asha_302" :	"Nokia Asha 302",
		"Nokia_Lumia_630" :	"Nokia Lumia 630",
		"Nokia_Lumia_630" :	"Nokia Lumia 630",
		"Nokia_C3" :	"Nokia C3",
		"Nokia_C3" :	"Nokia C3",
		"Nokia_Asha_300" :	"Nokia Asha 300",
		"Nokia_Asha_300" :	"Nokia Asha 300",
		"Nokia_X2_Dual_SIM" :	"Nokia X2 Dual SIM",
		"Nokia_X2_Dual_SIM" :	"Nokia X2 Dual SIM",
		"Nokia_Lumia_610" :	"Nokia Lumia 610",
		"Nokia_Lumia_610" :	"Nokia Lumia 610",
		"Nokia_Asha_310" :	"Nokia Asha 310",
		"Nokia_Asha_310" :	"Nokia Asha 310",
		"Nokia_Asha_308" :	"Nokia Asha 308",
		"Nokia_Asha_308" :	"Nokia Asha 308",
		"Nokia_Lumia_530_Dual_SIM" :	"Nokia Lumia 530 Dual SIM",
		"Nokia_Lumia_530_Dual_SIM" :	"Nokia Lumia 530 Dual SIM",
		"Nokia_Lumia_521" :	"Nokia Lumia 521",
		"Nokia_Lumia_521" :	"Nokia Lumia 521",
		"Nokia_X+" :	"Nokia X+",
		"Nokia_X+" :	"Nokia X+",
		"Nokia_Asha_309" :	"Nokia Asha 309",
		"Nokia_Asha_309" :	"Nokia Asha 309",
		"Nokia_Asha_210" :	"Nokia Asha 210",
		"Nokia_Asha_210" :	"Nokia Asha 210",
		"Nokia_Asha_502" :	"Nokia Asha 502",
		"Nokia_Asha_502" :	"Nokia Asha 502",
		"Nokia_Asha_311" :	"Nokia Asha 311",
		"Nokia_Asha_311" :	"Nokia Asha 311",
		"Nokia_X" :	"Nokia X",
		"Nokia_X" :	"Nokia X",
		"Nokia_C2-06" :	"Nokia C2-06",
		"Nokia_C2-06" :	"Nokia C2-06",
		"Nokia_C2-01" :	"Nokia C2-01",
		"Nokia_C2-01" :	"Nokia C2-01",
		"Nokia_208_Dual_SIM" :	"Nokia 208 Dual SIM",
		"Nokia_208_Dual_SIM" :	"Nokia 208 Dual SIM",
		"Nokia_C2" :	"Nokia C2",
		"Nokia_C2" :	"Nokia C2",
		"Nokia_Asha_503" :	"Nokia Asha 503",
		"Nokia_Asha_503" :	"Nokia Asha 503",
		"Nokia_Asha_305" :	"Nokia Asha 305",
		"Nokia_Asha_305" :	"Nokia Asha 305",
		"Nokia_Asha_230" :	"Nokia Asha 230",
		"Nokia_Asha_230" :	"Nokia Asha 230",
		"Nokia_C2-02" :	"Nokia C2-02",
		"Nokia_C2-02" :	"Nokia C2-02",
		"Nokia_Asha_206" :	"Nokia Asha 206",
		"Nokia_Asha_206" :	"Nokia Asha 206",
		"Nokia_225_Dual_Sim" :	"Nokia 225 Dual Sim",
		"Nokia_225_Dual_Sim" :	"Nokia 225 Dual Sim",
		"Nokia_Asha_501" :	"Nokia Asha 501",
		"Nokia_Asha_501" :	"Nokia Asha 501",
		"Nokia_Asha_500" :	"Nokia Asha 500",
		"Nokia_Asha_500" :	"Nokia Asha 500",
		"Nokia_220" :	"Nokia 220",
		"Nokia_220" :	"Nokia 220",
		"Nokia_X1-01" :	"Nokia X1-01 ",
		"Nokia_X1-01" :	"Nokia X1-01",
		"Nokia_106" :	"Nokia 106",
		"Nokia_106" :	"Nokia 106",
		"Nokia_108_Dual_SIM" :	"Nokia 108 Dual SIM",
		"Nokia_108_Dual_SIM" :	"Nokia 108 Dual SIM",
		"Nokia_100" :	"Nokia 100",
		"Nokia_100" :	"Nokia 100",
		"Nokia_130_Dual_SIM" :	"Nokia 130 Dual SIM",
		"Nokia_130_Dual_SIM" :	"Nokia 130 Dual SIM",
		"Nokia_107_Dual_SIM" :	"Nokia 107 Dual SIM",
		"Nokia_107_Dual_SIM" :	"Nokia 107 Dual SIM",
		"Nokia_1280" :	"Nokia 1280",
		"Nokia_1280" :	"Nokia 1280",
		"Nokia_105" :	"Nokia 105",
		"Nokia_105" :	"Nokia 105",
		"Nokia_N1" :	"Nokia N1",
		"Nokia_N1" :	"Nokia N1",
		"Nokia_130" :	"Nokia 130",
		"Nokia_130" :	"Nokia 130",
		"Nokia_Lumia_638" :	"Nokia Lumia 638",
		"Nokia_Lumia_638" :	"Nokia Lumia 638",
		"Nokia_Lumia_636" :	"Nokia Lumia 636",
		"Nokia_Lumia_636" :	"Nokia Lumia 636",
		"Nokia_Lumia_2020" :	"Nokia Lumia 2020",
		"Nokia_Lumia_2020" :	"Nokia Lumia 2020",
		"modelOther" : "other"
	 };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(nokia_phone_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "phone")&&($("#electroBrand").val() === "alcatel")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      var alcatel_version ={ 
       "alcatel" : "Alcatel",  "modelOther" : "other"
      };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(alcatel_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "phone")&&($("#electroBrand").val() === "sony")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      //sony mobile
	 var sony_phone_version = {
		"Xperia_Z3_LTE" : 	"Xperia Z3 LTE",
		"Xperia_Z3_Compact" : 	"Xperia Z3 Compact",
		"Xperia®_Z2" : 	"Xperia® Z2",
		"Xperia_T3" : 	"Xperia T3",
		"Xperia_M_dual" : 	"Xperia M dual",
		"Xperia_M2_LTE" : 	"Xperia M2 LTE",
		"Xperia_M2_Dual" : 	"Xperia M2 Dual",
		"Xperia_Z1_Compact" : 	"Xperia Z1 Compact",
		"modelOther" : "Other"
	 };	
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(sony_phone_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "phone")&&($("#electroBrand").val() === "brandOther")) {
     $("input#eBrand-other").show(); //show the input element for entering the electronic brand manually
    }else{

    };
  });
}



//show only the version of phone related to the phone selected
function select_tv_kind(){
 $("#electroBrand").click(function() {
    var $el = $("#electroName");
    var firstOption = $("#electroName option:first-child");
   if(($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "lg")){
   	 $("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
     //LG tv
	 var lg_tv_version = {
		"29_Class_29_0_Diagonal_720p_LED_TV" :	"29 Class (29.0 Diagonal) 720p LED TV",
		"105_Class_104_6_Diagonal_UHD_4K_Smart_3D_Curved_LED_TV_w/_webOS™_105UC9" :	"105 Class (104.6 Diagonal) UHD 4K Smart 3D Curved LED TV w/ webOS™ 105UC9",
		"77_Class_76_7_Diagonal_UHD_4K_Smart_3D_Curved_OLED_TV_w/_webOS™_77EG9700" :	"77 Class (76.7 Diagonal) UHD 4K Smart 3D Curved OLED TV w/ webOS™ 77EG9700",
		"60_Class_59_5_Diagonal_1080p_LED_TV_60LB5200" :	"60 Class (59.5 Diagonal) 1080p LED TV 60LB5200",
		"65_Class_64_5_Diagonal_1080p_LED_TV_65LB5200" :	"65 Class (64.5 Diagonal) 1080p LED TV 65LB5200",
		"98_Class_97_5_Diagonal_UHD_4K_Smart_3D_LED_TV_w/_webOS™_98UB9800" :	"98 Class (97.5 Diagonal) UHD 4K Smart 3D LED TV w/ webOS™ 98UB9800",
		"32_Class_31_5_Diagonal_720p_LED_TV_32LB520B" :	"32 Class (31.5 Diagonal) 720p LED TV 32LB520B",
		"49_Class_48_5_Diagonal_UHD_4K_Smart_3D_LED_TV49UB8300" :	"49 Class (48.5 Diagonal) UHD 4K Smart 3D LED TV49UB8300",
		"55_Class_54_6_Diagonal_UHD_4K_Smart_3D_LED_TV_55UB8300" :	"55 Class (54.6 Diagonal) UHD 4K Smart 3D LED TV 55UB8300",
		"42_Class_41_9_Diagonal_1080p_LED_TV_42LB5550" :	"42 Class (41.9 Diagonal) 1080p LED TV 42LB5550",
		"49_Class_48_5_Diagonal_1080p_LED_TV_49LB5550" :	"49 Class (48.5 Diagonal) 1080p LED TV 49LB5550",
		"55_Class_54_6_Diagonal_1080p_LED_TV_55LB5550" :	"55 Class (54.6 Diagonal) 1080p LED TV 55LB5550",
		"modelOther" : "other"
	 };
     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(lg_tv_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "samsung")) {
     $("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      //samsung_tvs
	 var samsung_tv_version = {
		"Samsung_23_Inch_HD_23H4003_LED" :	"Samsung 23 Inch HD 23H4003 LED",
		"Samsung_22_Inch_Full_HD_LED_UA22F5100AR" :	"Samsung 22 Inch Full HD LED UA22F5100AR ",
		"Samsung_32_Inch_HD_Ready_Smart_LED_32H4303" :	"Samsung 32 Inch HD Ready Smart LED 32H4303",
		"Samsung_32_Inch_Full_HD_32H5500_LED" :	"Samsung 32 Inch Full HD 32H5500 LED ",
		"Samsung_UA32EH4003E_32_Inches_LED" :	"Samsung UA32EH4003E 32 Inches LED ",
		"Samsung_32_Inch_Full_HD_32H5100_LED" :	"Samsung 32 Inch Full HD 32H5100 LED",
		"Samsung_32_Inch_HD_32H4100_LED" :	"Samsung 32 Inch HD 32H4100 LED",
		"Samsung_40_Inch_Full_HD_40H5100_LED" :	"Samsung 40 Inch Full HD 40H5100 LED ",
		"Samsung_24H4003_LED" :	"Samsung 24H4003 LED ",
		"Samsung_24_Inch_HD_24H4100_LED" :	"Samsung 24 Inch HD 24H4100 LED",
		"Samsung_43_Inch_43H4100_Plasma" :	"Samsung 43 Inch 43H4100 Plasma",
		"Samsung_40_Inch_Full_HD_3D_LED_UA40F6400AR" :	"Samsung 40 Inch Full HD 3D LED UA40F6400AR",
		"Samsung_40_Inch_Full_HD_40H5500_LED" :	"Samsung 40 Inch Full HD 40H5500 LED",
		"Samsung_40_Inch_Full_HD_LED_40F5000" :	"Samsung 40 Inch Full HD LED 40F5000 ",
		"Samsung_40_Inch_40H4200_LED" :	"Samsung 40 Inch 40H4200 LED ",
		"Samsung_23_Inch_HD_LED_UA23F4003" :	"Samsung 23 Inch HD LED UA23F4003 ",
		"Samsung_32_Inch_Full_HD_3D_LED_UA32F6100AR" :	"Samsung 32 Inch Full HD 3D LED UA32F6100AR",
		"Samsung_48_Inch_Full_HD_48H6400_LED" :	"Samsung 48 Inch Full HD 48H6400 LED ",
		"Samsung_48_Inch_Full_HD_48H5100_LED" :	"Samsung 48 Inch Full HD 48H5100 LED ",
		"Samsung_40_Inch_Full_HD_40H6400_LED" :	"Samsung 40 Inch Full HD 40H6400 LED ",
		"Samsung_55_Inch_Full_HD_55H6400_LED" :	"Samsung 55 Inch Full HD 55H6400 LED ",
		"Samsung_32_Inch_Full_HD_32H6400_3D_LED" :	"Samsung 32 Inch Full HD 32H6400 3D LED ",
		"Samsung_40EH5000_40_Inches_LED" :	"Samsung 40EH5000 40 Inches LED ",
		"Samsung_28_Inch_HD_28H4100_LED" :	"Samsung 28 Inch HD 28H4100 LED ",
		"Samsung_32_Inch_Full_HD_LED_UA32F5500AR" :	"Samsung 32 Inch Full HD LED UA32F5500AR ",
		"Samsung_48_Inch_Full_HD_48H5500_LED" :	"Samsung 48 Inch Full HD 48H5500 LED ",
		"Samsung_20_Inch_WXGA_LED_20H4003" :	"Samsung 20 Inch WXGA LED 20H4003 ",
		"Samsung_40_Inch_Full_HD_40H5000_LED" :	"Samsung 40 Inch Full HD 40H5000 LED",
		"Samsung_UA32EH6030E_32_Inches_LED_3D_Full" :	"Samsung UA32EH6030E 32 Inches LED 3D Full",
		"Samsung_48_Inch_HD_Ready_LED_48H4240" :	"Samsung 48 Inch HD Ready LED 48H4240 ",
		"Samsung_55_Inch_Full_HD_3D_Smart_UA55F8000AR" :	"Samsung 55 Inch Full HD 3D Smart UA55F8000AR",
		"Samsung_40_Inch_Full_HD_LED_UA40F5100AR" :	"Samsung 40 Inch Full HD LED UA40F5100AR ",
		"Samsung_32_Inch_HD_LED_UA32F4500AR" :	"Samsung 32 Inch HD LED UA32F4500AR",
		"Samsung_UA32EH4003R_32_Inches_LED" :	"Samsung UA32EH4003R 32 Inches LED ",
		"Samsung_32_Inch_HD_LED_32F4000" :	"Samsung 32 Inch HD LED 32F4000 ",
		"Samsung_32_Inch_Full_HD_3D_LED_UA32F6400AR" :	"Samsung 32 Inch Full HD 3D LED UA32F6400AR",
		"Samsung_46_Inch_Full_HD_LED_UA46F5500AR" :	"Samsung 46 Inch Full HD LED UA46F5500AR ",
		"Samsung_40_Inch_Full_HD_3D_LED_UA40F6800AR" :	"Samsung 40 Inch Full HD 3D LED UA40F6800AR",
		"Samsung_23_Inch_HD_LED_UA23F4002" :	"Samsung 23 Inch HD LED UA23F4002 ",
		"Samsung_32_Inch_HD_32H4000_LED" :	"Samsung 32 Inch HD 32H4000 LED ",
		"Samsung_46H7000_46_Inches_Full_HD_3D_Smart" :	"Samsung 46H7000 46 Inches Full HD 3D Smart",
		"Samsung_28_Inch_HD_28H4000_LED" :	"Samsung 28 Inch HD 28H4000 LED",
		"Samsung_55_Inch_Full_HD_LED_UA55F6400AR" :	"Samsung 55 Inch Full HD LED UA55F6400AR ",
		"Samsung_43_Inches_Plasma_PS43F4100AR" :	"Samsung 43 Inches Plasma PS43F4100AR",
		"Samsung_40_Inch_Full_HD_LED_UA40F5500AR" :	"Samsung 40 Inch Full HD LED UA40F5500AR ",
		"Samsung_UA32F5100AR_32_Inch_Full_HD_LED" :	"Samsung UA32F5100AR 32 Inch Full HD LED ",
		"Samsung_51_Inch_HD_51H4900_Plasma" :	"Samsung 51 Inch HD 51H4900 Plasma ",
		"Samsung_32E420_32_Inches_LCD_HD" :	"Samsung 32E420 32 Inches LCD HD ",
		"Samsung_ED46D_46_Inches_LFD_Full_HD_LED" :	"Samsung ED46D 46 Inches LFD Full HD LED ",
		"Samsung_32H4140_32_inches_HD_Ready_LED" :	"Samsung 32H4140 32 inches HD Ready LED ",
		"Samsung_65_Inch_Ultra_HD_65HU9000_3D_LED" :	"Samsung 65 Inch Ultra HD 65HU9000 3D LED",
		"Samsung_28F4000_28_Inch_HD_LED" :	"Samsung 28F4000 28 Inch HD LED ",
		"modelOther" : "other"
	 }
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(samsung_tv_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "toshiba")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      //toshiba tv
	 var toshiba_tv_version = {
		"Toshiba_32P2400_LED" :	"Toshiba 32P2400 LED ",
		"Toshiba_40L2400_LED" :	" Toshiba 40L2400 LED ",
		"Toshiba_32P2305_32_Inch_HD_LED" :	" Toshiba 32P2305 32 Inch HD LED ",
		"Toshiba_24P1300_24_Inch_HD_LED" :	" Toshiba 24P1300 24 Inch HD LED ",
		"Toshiba_40PB20_40_Inches_LCD_Full_HD" :	"Toshiba 40PB20 40 Inches LCD Full HD ",
		"Toshiba_32L3300_32_Inch_HD_LED" :	" Toshiba 32L3300 32 Inch HD LED ",
		"Toshiba_29P1300_29_Inch_HD_LED" :	" Toshiba 29P1300 29 Inch HD LED ",
		"Toshiba_19S2400_48_cm_(19)_LED" :	" Toshiba 19S2400 48 cm (19) LED ",
		"Toshiba_32PX200_32_Inches_LED_Full_HD" :	" Toshiba 32PX200 32 Inches LED Full HD ",
		"Toshiba_24PA200_24_Inches_LCD_Full_HD" :	" Toshiba 24PA200 24 Inches LCD Full HD ",
		"Toshiba_24P2305_24_Inch_HD_LED" :	" Toshiba 24P2305 24 Inch HD LED ",
		"Toshiba_40PS200_40_Inches_LED_Full_HD" :	" Toshiba 40PS200 40 Inches LED Full HD ",
		"Toshiba_32P1400_32_inches_HD_LED" :	" Toshiba 32P1400 32 inches HD LED",
		"Toshiba_40PU200_40_Inches_LED" :	"Toshiba 40PU200 40 Inches LED ",
		"Toshiba_32PT200_32_Inch_HD_LED" :	" Toshiba 32PT200 32 Inch HD LED ",
		"Toshiba_32_Inches_HD_LCD_32HV10ZE" :	" Toshiba 32 Inches HD LCD 32HV10ZE ",
		"Toshiba_39L3300_39_Inch_Full_HD_LED" :	" Toshiba 39L3300 39 Inch Full HD LED ",
		"Toshiba_55L2400VM_55_Inch_Full_HD_LED" :	" Toshiba 55L2400VM 55 Inch Full HD LED ",
		"Toshiba_32PU200_32_Inches_LED" :	" Toshiba 32PU200 32 Inches LED ",
		"Toshiba_29P2305_29_Inch_HD_LED" :	" Toshiba 29P2305 29 Inch HD LED ",
		"Great_Deal!DEALToshiba_32PS200_32_Inches_LED" :	" Great Deal!DEALToshiba 32PS200 32 Inches LED ",
		"Toshiba_23S2400_58_cm_(23)_LED" :	" Toshiba 23S2400 58 cm (23) LED ",
		"Toshiba_50L2300_50_Inch_Full_HD_LED" :	" Toshiba 50L2300 50 Inch Full HD LED ",
		"Toshiba_19_Inches_HD_LED_19HV10ZE" :	" Toshiba 19 Inches HD LED 19HV10ZE ",
		"Toshiba_47L2400VM_47_Inch_Full_HD_LED" :	" Toshiba 47L2400VM 47 Inch Full HD LED ",
		"Toshiba_40PX200_40_Inches_LED_Full_HD" :	" Toshiba 40PX200 40 Inches LED Full HD ",
		"Toshiba_29PB200_29_Inch_LED" :	" Toshiba 29PB200 29 Inch LED ",
		"Toshiba_29PU200_29_Inch_LED" :	"Toshiba 29PU200 29 Inch LED ",
		"Toshiba_40TL20_40_Inches_LED" :	" Toshiba 40TL20 40 Inches LED ",
		"Toshiba_46PB20_46_Inches_LCD_Full_HD" :	" Toshiba 46PB20 46 Inches LCD Full HD ",
		"modelOther" : "other"
	 };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(toshiba_tv_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "panasonic")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      //panasonic_tv
	 var panasonic_tv_version = {
		"Panasonic_TH-32A401DX_LED" :	" Panasonic TH-32A401DX LED ",
		"Panasonic_40_Inch_Full_HD_TH-L40B6D_LED" :	" Panasonic 40 Inch Full HD TH-L40B6D LED ",
		"Panasonic_Viera_32_Inch_HD_LED_TH-L32SV6D" :	" Panasonic Viera 32 Inch HD LED TH-L32SV6D",
		"Panasonic_32A300D_32_Inch_HD_LED" :	" Panasonic 32A300D 32 Inch HD LED ",
		"Panasonic_23_Inch_HD_TH-L23A400DX_LED" :	" Panasonic 23 Inch HD TH-L23A400DX LED ",
		"Panasonic_42_Inch_Full_HD_TH-42A410D_LED" :	" Panasonic 42 Inch Full HD TH-42A410D LED",
		"Panasonic_TH-32AS630D" :	" Panasonic TH-32AS630D ",
		"Panasonic_TH-L24X5D_24_Inches_LED_Full_HD" :	" Panasonic TH-L24X5D 24 Inches LED Full HD",
		"Panasonic_40A300D_40_inches_HD_Ready_LED" :	" Panasonic 40A300D 40 inches HD Ready LED",
		"Panasonic_Viera_TH-50AS610D_50_inches_Full" :	" Panasonic Viera TH-50AS610D 50 inches Full",
		"Panasonic_Viera_TH-42AS630D_42_inches_Full" :	" Panasonic Viera TH-42AS630D 42 inches Full",
		"Panasonic_Viera_32_Inch_Full_HD_LED_TH-L32E6D" :	" Panasonic Viera 32 Inch Full HD LED TH-L32E6D",
		"Panasonic_TH-32VMB6DM_32_inches_HD_LED" :	" Panasonic TH-32VMB6DM 32 inches HD LED ",
		"Panasonic_TH-L32XV6D_32_Inch_HD_LED" :	" Panasonic TH-L32XV6D 32 Inch HD LED ",
		"Panasonic_32_Inch_HD_TH-32A405D_LED" :	" Panasonic 32 Inch HD TH-32A405D LED ",
		"Panasonic_28_Inch_HD_28A400_LED" :	" Panasonic 28 Inch HD 28A400 LED ",
		"Panasonic_TH-L23A403DX_23_inches_HD" :	" Panasonic TH-L23A403DX 23 inches HD ",
		"Panasonic_40_Inch_Full_HD_LED_TH-40SV7D" :	" Panasonic 40 Inch Full HD LED TH-40SV7D ",
		"Panasonic_50_Inch_Full_HD_TH-50A410D_LED" :	" Panasonic 50 Inch Full HD TH-50A410D LED",
		"Great_Deal!DEALPanasonic_TH-L32B60D_32_Inch_HD_LED" :	" Great Deal!DEALPanasonic TH-L32B60D 32 Inch HD LED ",
		"Panasonic_TH-L22EM6DX_22_Inch_Full_HD_LED" :	" Panasonic TH-L22EM6DX 22 Inch Full HD LED",
		"Panasonic_32_Inch_HD_TH-32AS610" :	"Panasonic 32 Inch HD TH-32AS610 ",
		"Panasonic_Viera_TH-42AS670D_42_inches_3D" :	" Panasonic Viera TH-42AS670D 42 inches 3D",
		"Panasonic_TH-42AS610D_LED" :	" Panasonic TH-42AS610D LED ",
		"Panasonic_Viera_TH-50AS670D_50_inches_3D" :	" Panasonic Viera TH-50AS670D 50 inches 3D",
		"Panasonic_32_Inch_HD_TH-32A410D_LED" :	" Panasonic 32 Inch HD TH-32A410D LED ",
		"Panasonic_42_Inch_Full_HD_TH-42A400D_LED" :	" Panasonic 42 Inch Full HD TH-42A400D LED",
		"Panasonic_Viera_24_Inch_HD_LED_TH-L24XM6D" :	" Panasonic Viera 24 Inch HD LED TH-L24XM6D",
		"Panasonic_VIERA_32_Inches_HD_TH-L32C22_LCD" :	" Panasonic VIERA 32 Inches HD TH-L32C22 LCD",
		"Panasonic_TH-32A403DX_32_Inch_LED" :	"Panasonic TH-32A403DX 32 Inch LED ",
		"Panasonic_Viera_TH-40A400D_40_inches_Full" :	" Panasonic Viera TH-40A400D 40 inches Full",
		"Panasonic_TH-24A403DX_(24_inch)_LED" :	" Panasonic TH-24A403DX (24 inch) LED ",
		"Panasonic_TH-23A403DX_LED" :	" Panasonic TH-23A403DX LED ",
		"Panasonic_55_Inch_3D_Full_HD_Smart_LED_TH-55A" :	"Panasonic 55 Inch 3D Full HD Smart LED TH-55A",
		"Panasonic_TH-P50X50D_50_Inches_Plasma_HD" :	" Panasonic TH-P50X50D 50 Inches Plasma HD",
		"Panasonic_Viera_42_Inches_3D_Full_HD_Plasma" :	" Panasonic Viera 42 Inches 3D Full HD Plasma",
		"Panasonic_60_Inch3D_Full_HD_Smart_LED_TH-60AS" :	" Panasonic 60 Inch3D Full HD Smart LED TH-60AS",
		"Panasonic_32_Inch_HD_TH-32AS610_LED" :	" Panasonic 32 Inch HD TH-32AS610 LED ",
		"Panasonic_Viera_TH-L24XM60D_24_Inch_HD_LED" :	" Panasonic Viera TH-L24XM60D 24 Inch HD LED",
		"Panasonic_Viera_32_Inches_HD_LCD_TH-L32X24D" :	" Panasonic Viera 32 Inches HD LCD TH-L32X24D",
		"Panasonic_TH-P42UT50D_42_Inches_Plasma_3D" :	" Panasonic TH-P42UT50D 42 Inches Plasma 3D",
		"Great_Deal!DEALPanasonic_TH-29B6DX_29_Inch_HD_LED" :	" Great Deal!DEALPanasonic TH-29B6DX 29 Inch HD LED ",
		"Panasonic_TH-L42DT50D_42_Inches_LED_3D_Full" :	" Panasonic TH-L42DT50D 42 Inches LED 3D Full",
		"Panasonic_TH-L42ET50D_42_Inches_LED_3D_Full" :	" Panasonic TH-L42ET50D 42 Inches LED 3D Full",
		"Panasonic_TH-L42ET5D_42_Inches_LED_3D_Full" :	" Panasonic TH-L42ET5D 42 Inches LED 3D Full",
		"Panasonic_TH-L55ET5D_55_Inches_LED_3D_Full" :	" Panasonic TH-L55ET5D 55 Inches LED 3D Full",
		"Panasonic_TH-42AM410D_42_inch_Full_HD_LED" :	" Panasonic TH-42AM410D 42 inch Full HD LED",
		"Panasonic_TH-L32XM6D_32_Inch_HD_LED" :	" Panasonic TH-L32XM6D 32 Inch HD LED ",
		"Panasonic_TH-L50DT60D_50_Inches_Full_HD_LED" :	" Panasonic TH-L50DT60D 50 Inches Full HD LED",
		"Panasonic_TH-L47ET50D_47_Inches_LED_3D" :	" Panasonic TH-L47ET50D 47 Inches LED 3D",
		"modelOther" : "other"
	 };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(panasonic_tv_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "sony")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
	 //sony tv
	 var sony_tv_version = {
		"Sony_32_Inch_HD_KLV-32R412B_LED" :	"Sony 32 Inch HD KLV-32R412B LED ",
		"Sony_Bravia_KLV-24P412B_24_Inch_HD" :	" Sony Bravia KLV-24P412B 24 Inch HD ",
		"Sony_Bravia_32_Inch_Full_HD_LED_KLV-32R422A" :	" Sony Bravia 32 Inch Full HD LED KLV-32R422A",
		"Sony_Bravia_32_Inch_Full_HD_LED_KLV-32R402A" :	" Sony Bravia 32 Inch Full HD LED KLV-32R402A",
		"Sony_Bravia_KLV-22P402B_22_Inch_Full_HD_LED" :	" Sony Bravia KLV-22P402B 22 Inch Full HD LED",
		"Sony_40_Inch_Full_HD_KLV-40R482_LED" :	" Sony 40 Inch Full HD KLV-40R482 LED ",
		"Sony_Bravia_KLV-32R422B_32_Inch_HD_LED" :	" Sony Bravia KLV-32R422B 32 Inch HD LED ",
		"Sony_Bravia_42_Inch_Full_HD_KDL-42W700B_LED" :	" Sony Bravia 42 Inch Full HD KDL-42W700B LED",
		"Sony_Bravia_32_Inch_Full_HD_KDL-32W700B_LED" :	" Sony Bravia 32 Inch Full HD KDL-32W700B LED",
		"Sony_Bravia_KLV-32R482B_32_Inch_Full_HD_LED" :	" Sony Bravia KLV-32R482B 32 Inch Full HD LED",
		"Sony_Bravia_40_Inch_Full_HD_LED_KLV-40R452A" :	" Sony Bravia 40 Inch Full HD LED KLV-40R452A",
		"Sony_Bravia_24_Inch_HD_LED_KLV-24R422A" :	" Sony Bravia 24 Inch HD LED KLV-24R422A ",
		"Sony_Bravia_KLV-24P422B_24_Inch_HD_LED" :	" Sony Bravia KLV-24P422B 24 Inch HD LED ",
		"Sony_Bravia_32_Inch_Full_HD_LED_KDL-32W600A" :	" Sony Bravia 32 Inch Full HD LED KDL-32W600A",
		"Sony_Bravia_42_Inch_Full_HD_LED_KDL-42W650A" :	" Sony Bravia 42 Inch Full HD LED KDL-42W650A",
		"Sony_Bravia_48W600B_48_Inch_Full_HD_LED" :	" Sony Bravia 48W600B 48 Inch Full HD LED ",
		"Sony_Bravia_KLV-28R412B_28_Inch_HD_LED" :	" Sony Bravia KLV-28R412B 28 Inch HD LED ",
		"Sony_KD-84X9000_84_Inch_4K_3D" :	" Sony KD-84X9000 84 Inch 4K 3D ",
		"Sony_42W900B_42_Inch_LED" :	" Sony 42W900B 42 Inch LED ",
		"Sony_KDL-40W900_40_Inch_Full_HD_3D_LED" :	" Sony KDL-40W900 40 Inch Full HD 3D LED ",
		"Sony_Bravia_32_Inch_Full_HD_LED_KDL-32W650A" :	" Sony Bravia 32 Inch Full HD LED KDL-32W650A",
		"Sony_KLV-48R482B_48_inches_Full_HD_LED" :	" Sony KLV-48R482B 48 inches Full HD LED ",
		"Sony_32EX550_32_Inches_LED_HD" :	" Sony 32EX550 32 Inches LED HD ",
		"Sony_Bravia_50_Inch_Full_HD_KDL-50W800B_LED" :	" Sony Bravia 50 Inch Full HD KDL-50W800B LED",
		"Sony_KDL-24W600A_24_Inch_HD_LED" :	" Sony KDL-24W600A 24 Inch HD LED ",
		"Sony_KDL_40HX750_40_Inches_LED_3D_Full_HD" :	" Sony KDL 40HX750 40 Inches LED 3D Full HD",
		"Sony_Bravia_KDL-42W670A_42_Inch_Full_HD_LED" :	" Sony Bravia KDL-42W670A 42 Inch Full HD LED",
		"Sony_Bravia_KDL-42W850A_42_Inch_Full_HD_3D" :	" Sony Bravia KDL-42W850A 42 Inch Full HD 3D",
		"Sony_Bravia_32_Inch_Full_HD_LED_KDL-32W670A" :	" Sony Bravia 32 Inch Full HD LED KDL-32W670A",
		"Sony_KDL-40EX650_40_Inches_LED_Full_HD" :	" Sony KDL-40EX650 40 Inches LED Full HD ",
		"Sony_KD-55X8500B_55_Inch_3D_4K_LED" :	" Sony KD-55X8500B 55 Inch 3D 4K LED ",
		"Sony_Bravia_55W950B_55_Inch_Full_HD_LED" :	" Sony Bravia 55W950B 55 Inch Full HD LED ",
		"Sony_Bravia_46_Inch_Full_HD_LED_KDL-46W700A" :	" Sony Bravia 46 Inch Full HD LED KDL-46W700A",
		"Sony_Bravia_46_Inch_Full_HD_LED_KLV-46R452A" :	" Sony Bravia 46 Inch Full HD LED KLV-46R452A",
		"Sony_Bravia_KD-79X9000B_79_Inch_3D_4K" :	" Sony Bravia KD-79X9000B 79 Inch 3D 4K ",
		"Sony_KDL-32HX750_32_Inches_LED_3D_Full_HD" :	" Sony KDL-32HX750 32 Inches LED 3D Full HD",
		"Sony_22CX350_22_Inches_LCD_HD" :	" Sony 22CX350 22 Inches LCD HD ",
		"Sony_KDL-32EX650_32_Inches_LED_Full_HD" :	"Sony KDL-32EX650 32 Inches LED Full HD ",
		"Sony_26EX550_26_Inches_LED_HD" :	" Sony 26EX550 26 Inches LED HD ",
		"Sony_Bravia_46_Inch_3D_Full_HD_LED_KDL-46W950" :	" Sony Bravia 46 Inch 3D Full HD LED KDL-46W950",
		"Sony_Bravia_KDL-47W850A_47_Inch_Full_HD_3D" :	" Sony Bravia KDL-47W850A 47 Inch Full HD 3D",
		"Sony_Bravia_KDL-32NX650_32_Inches_LED_Full" :	" Sony Bravia KDL-32NX650 32 Inches LED Full",
		"Sony_Bravia_50W900B_50_Inch_Full_HD_3D_LED" :	" Sony Bravia 50W900B 50 Inch Full HD 3D LED",
		"Sony_55_Inch_3D_Full_HD_LED_KDL-55W950A" :	" Sony 55 Inch 3D Full HD LED KDL-55W950A ",
		"Sony_Bravia_KD-65X9004_65_Inch_3D_4K_LED" :	" Sony Bravia KD-65X9004 65 Inch 3D 4K LED",
		"Sony_KLV-32EX330_32_Inches_HD_LED" :	" Sony KLV-32EX330 32 Inches HD LED ",
		"Sony_KD-65X9000B_65_Inch_4K_Ultra_HD_3D_LED" :	"Sony KD-65X9000B 65 Inch 4K Ultra HD 3D LED",
		"Sony_KLV-46EX430_46_Inch_Full_HD_LED" :	" Sony KLV-46EX430 46 Inch Full HD LED ",
		"Sony_Bravia_KD-49X8500B_49_Inch_3D_4K" :	" Sony Bravia KD-49X8500B 49 Inch 3D 4K ",
		"Sony_KLV_22BX350_22_Inches_LCD_HD" :	" Sony KLV 22BX350 22 Inches LCD HD ",
		"Sony_Bravia_KD-55X9000B_55_inches_4K_Ultra" :	" Sony Bravia KD-55X9000B 55 inches 4K Ultra",
		"Sony_47_Inch_Full_HD_3D_LED_KDL-47W800A" :	" Sony 47 Inch Full HD 3D LED KDL-47W800A ",
		"modelOther" : "other"
	 };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(sony_tv_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "sharp")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
	   //sharp_tvs
	 var sharp_tv_version = {
		"Sharp_32_Inch_HD_LC32LE155M_LED" :	"Sharp 32 Inch HD LC32LE155M LED ",
		"Sharp_LC-32LE341M_32_inches_Full_HD_LED" :	"Sharp LC-32LE341M 32 inches Full HD LED ",
		"Sharp_39LE155_39_Inch_Full_HD_LED" :	" Sharp 39LE155 39 Inch Full HD LED ",
		"Sharp_40_Inch_Full_HD_LC40LE355M_LED" :	" Sharp 40 Inch Full HD LC40LE355M LED ",
		"Sharp_32LE350_32_Inch_HD_LED" :	" Sharp 32LE350 32 Inch HD LED ",
		"Sharp_32_Inch_HD_32LE156_LED" :	" Sharp 32 Inch HD 32LE156 LED ",
		"modelOther" : "other"
	 };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(sharp_tv_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "tv")&&($("#electroBrand").val() === "brandOther")) {
     $("input#eBrand-other").show(); //show the input element for entering the electronic brand manually
    };
  });
}


    //show only the version computer related to the computer selected
function select_computer_kind(){
 $("#electroBrand").click(function() {
    var $el = $("#electroName");
    var firstOption = $("#electroName option:first-child");
   if(($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "toshiba")){
   	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
     var toshiba_comp_version ={
		"Toshiba_Satellite_Laptops" : "Toshiba Satellite Laptops","A100_Series" : "A100 Series",
		"A300_Series" : "A300 Series","A500_Series" : "A500 Series","C50_Series" : "C50 Series",
		"C650_Series" : "C650 Series","C70_Series" : "C70 Series","C850_Series" : "C850 Series",
		"C870_Series" : "C870 Series","CL10_Series" : "CL10 Series","Click_Series" : "Click Series",
		"Click2_Series" : "Click2 Series","Click2Pro_Series" : "Click2Pro Series","E100_Series" : "E100 Series",
		"E300_Series" : "E300 Series","E40_Series" : "E40 Series","E50_Series" : "E50 Series",
		"L300_Series" : "L300 Series","L350_Series" : "L350 Series","L40_Series" : "L40 Series",
		"L450_Series" : "L450 Series","L50_Series" : "L50 Series","L500_Series" : "L500 Series",
		"L510_Series" : "L510 Series","L550_Series" : "L550 Series","L630_Series" : "L630 Series",
		"L640_Series" : "L640 Series","L650_Series" : "L650 Series","L670_Series" : "L670 Series",
		"L70_Series" : "L70 Series","L730_Series" : "L730 Series","L740_Series" : "L740 Series",
		"L750_Series" : "L750 Series","L770_Series" : "L770 Series","L850-Series" : "L850-Series",
		"L870_Series" : "L870 Series","L950_Series" : "L950 Series","M300_Series" : "M300 Series",
		"M500_Series" : "M500 Series","M640_Series" : "M640 Series","NB10_Series" : "NB10 Series",
		"P200_Series" : "P200 Series","P300_Series" : "P300 Series","P50_Series" : "P50 Series",
		"P500_Series" : "P500 Series","P70_Series" : "P70 Series","P740_Series" : "P740 Series",
		"P750_Series" : "P750 Series","P770_Series" : "P770 Series","P840_Series" : "P840 Series",
		"R840_Series" : "R840 Series","Radius_Series" : "Radius Series","Radius11_Series" : "Radius11 Series",
		"S50_Series" : "S50 Series","S70_Series" : "S70 Series","S850_Series" : "S850 Series",
		"T110_Series" : "T110 Series","T130_Series" : "T130 Series","T210_Series" : "T210 Series",
		"T230_Series" : "T230 Series","U300_Series" : "U300 Series","U400_Series" : "U400 Series",
		"U500_Series" : "U500 Series","U840_Series" : "U840 Series","U840W_Series" : "U840W Series",
		"U920T_Series" : "U920T Series","U940_Series" : "U940 Series","X200_Series" : "X200 Series",
		"Toshiba_Satellite_Pro_Laptops" : "Toshiba Satellite Pro Laptops","C650_Series" : "C650 Series",
		"L350_Series" : "L350 Series","L450_Series" : "L450 Series","S300_Series" : "S300 Series",
		"S300M_Series" : "S300M Series","T110_Series" : "T110 Series","U400_Series" : "U400 Series",
		"U500_Series" : "U500 Series",
		"Toshiba_Tecra_Laptops" : "Toshiba Tecra Laptops","A50_Series" : "A50 Series","C50_Series" : "C50 Series",
		"R940_Series" : "R940 Series","R950_Series" : "R950 Series","W50_Series" : "W50 Series",
		"Z40_Series" : "Z40 Series","Z50_Series" : "Z50 Series","Toshiba_Qosmio_Laptops" : "Toshiba Qosmio Laptops",
		"X300_Series" : "X300 Series","X70_Series" : "X70 Series","X770_Series" : "X770 Series",
		"Toshiba_Portege_Laptops" : "Toshiba Portege Laptops","M750_Series" : "M750 Series",
		"M780_Series" : "M780 Series","R30_Series" : "R30 Series","R400_Series" : "R400 Series",
		"R400-S4834" : "R400-S4834","R500_Series" : "R500 Series","R600_Series" : "R600 Series",
		"R700_Series" : "R700 Series","R830_Series" : "R830 Series","Z10t_Series" : "Z10t Series",
		"Z30_Series" : "Z30 Series","Z930_Series" : "Z930 Series",
		"Toshiba_mini_notebook_Laptops" : "Toshiba mini notebook Laptops",
		"NB200_Series" : "NB200 Series","NB300_Series" : "NB300 Series",
		"Toshiba_Chromebook_Laptops" : "Toshiba Chromebook Laptops","cb30_Series" : "cb30 Series",
		"cb30-2_Series" : "cb30-2 Series","cb30-2hd_Series" : "cb30-2hd Series",
		"Toshiba_KIRA™_Laptops" : "Toshiba KIRA™ Laptops","kirabook13_Series" : "kirabook13 Series",
		"Toshiba_Notebook_PCs_Laptops" : "Toshiba Notebook PCs Laptops","satellite_Series" : "satellite Series",
		"modelOther": "other"
		};

     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(toshiba_comp_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "hp")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      var hp_comp_version = {
		"P_Omnibook" : 	"P Omnibook",
		"OmniBook_300" : 	"OmniBook 300",
		"OmniBook_425" : 	"OmniBook 425",
		"OmniBook_525_530" : 	"OmniBook 525, 530",
		"OmniBook_600C_1st_OmniBook_offering_a_color_display" : 	"OmniBook 600C - 1st OmniBook offering a color display (DSTN)",
		"OmniBook_600CT_1st_OmniBook_offering_a_TFT_display" : 	"OmniBook 600CT - 1st OmniBook offering a TFT display",
		"OmniBook_4000" : 	"OmniBook 4000",
		"OmniBook_800CS_800CT" : 	"OmniBook 800CS, 800CT",
		"OmniBook_2000" : 	"OmniBook 2000",
		"OmniBook_3000" : 	"OmniBook 3000",
		"OmniBook_5500" : 	"OmniBook 5500",
		"OmniBook_5700CT" : 	"OmniBook 5700CT",
		"OmniBook_2100" : 	"OmniBook 2100",
		"OmniBook_XE" : 	"OmniBook XE",
		"OmniBook_Sojourn" : 	"OmniBook Sojourn",
		"OmniBook_900_900B" : 	"OmniBook 900, 900B",
		"OmniBook_4100_4150_4150B" : 	"OmniBook 4100, 4150, 4150B",
		"OmniBook_7100_7150" : 	"OmniBook 7100, 7150",
		"OmniBook_XE2" : 	"OmniBook XE2",
		"OmniBook_XE3" : 	"OmniBook XE3",
		"OmniBook_6000_6100" : 	"OmniBook 6000, 6100",
		"OmniBook_500" : 	"OmniBook 500",
		"OmniBook_vt6200" : 	"OmniBook vt6200",
		"Pavilion_notebooks" : 	"Pavilion notebooks",
		"HP_Pavilion_dm1" : 	"HP Pavilion dm1",
		"HP_Pavilion_dv2" : 	"HP Pavilion dv2",
		"HP_Pavilion_dv3" : 	"HP Pavilion dv3",
		"HP_Pavilion_dv4" : 	"HP Pavilion dv4",
		"HP_Pavilion_dv5" : 	"HP Pavilion dv5",
		"HP_Pavilion_dv6" : 	"HP Pavilion dv6",
		"HP_Pavilion_dv7" : 	"HP Pavilion dv7",
		"HP_Pavilion_dv8" : 	"HP Pavilion dv8",
		"HP_Pavilion_dv1000" : 	"HP Pavilion dv1000",
		"HP_Pavilion_dv2000" : 	"HP Pavilion dv2000",
		"HP_Pavilion_dv4000" : 	"HP Pavilion dv4000",
		"HP_Pavilion_dv5000" : 	"HP Pavilion dv5000",
		"HP_Pavilion_dv6000" : 	"HP Pavilion dv6000",
		"HP_Pavilion_dv_6767tx" : 	"HP Pavilion dv 6767tx",
		"HP_Pavilion_dv8000" : 	"HP Pavilion dv8000",
		"HP_Pavilion_dv8000" : 	"HP Pavilion dv8000",
		"HP_Pavilion_dv9000" : 	"HP Pavilion dv9000",
		"HP_Pavilion_TX1000_Series_Tablet_PC" : 	"HP Pavilion TX1000 Series Tablet PC",
		"HP_Pavilion_zd8000" : 	"HP Pavilion zd8000",
		"HP_Pavilion_ze2000" : 	"HP Pavilion ze2000",
		"HP_Pavilion_ze4100" : 	"HP Pavilion ze4100",
		"HP_Pavilion_ze4145" : 	"HP Pavilion ze4145",
		"HP_Pavilion_ze4430" : 	"HP Pavilion ze4430",
		"HP_Pavilion_ze4900" : 	"HP Pavilion ze4900",
		"HP_Pavilion_ze5600" : 	"HP Pavilion ze5600",
		"HP_Pavilion_zv5000" : 	"HP Pavilion zv5000",
		"HP_Pavilion_zv6000" : 	"HP Pavilion zv6000",
		"HP_Pavilion_HDX" : 	"HP Pavilion HDX",
		"HP_HDX_16" : 	"HP HDX 16",
		"HP_HDX_18" : 	"HP HDX 18",
		"HP_Envy" : 	"HP Envy",
		"HP_Envy_dv6" : 	"HP Envy dv6",
		"HP_Envy_dv7" : 	"HP Envy dv7",
		"HP_Envy_m6" : 	"HP Envy m6",
		"HP_Envy_m7" : 	"HP Envy m7",
		"HP_Envy_15" : 	"HP Envy 15",
		"HP_Envy_17" : 	"HP Envy 17",
		"G_series_(also_called_Pavilion)_" : 	"G series (also called Pavilion) ",
		"HP_G5000_Notebook_PC" : 	"HP G5000 Notebook PC",
		"HP_G6000_Notebook_PC" : 	"HP G6000 Notebook PC",
		"HP_G7000_Notebook_PC" : 	"HP G7000 Notebook PC",
		"HP_G60_Notebook_PC" : 	"HP G60 Notebook PC",
		"HP_G61_Notebook_PC" : 	"HP G61 Notebook PC",
		"HP_G62_Notebook_PC" : 	"HP G62 Notebook PC",
		"HP_G70_Notebook_PC" : 	"HP G70 Notebook PC",
		"HP_G42-366TX_Notebook_PC" : 	"HP G42-366TX Notebook PC",
		"HP_Pavilion_g6" : 	"HP Pavilion g6",
		"HP_Pavilion_g7" : 	"HP Pavilion g7",
		"HP_Mini" : 	"HP Mini",
		"HP_Mini_110/HP_Mini_110_by_Studio_Tord_Boontje" : 	"HP Mini 110/HP Mini 110 by Studio Tord Boontje",
		"HP" : "HP ",
		"modelOther": "other"
		};

      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(hp_comp_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "dell")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
	  var dell_comp_version = {
		"Dell_Adamo" : 	"Dell Adamo",
		"Dell_Inspiron_1764" : 	"Dell Inspiron 1764",
		"Dell_Inspiron" : 	"Dell Inspiron",
		"Dell_Inspiron_1525" : 	"Dell Inspiron 1525",
		"Dell_Inspiron_E1405" : 	"Dell Inspiron E1405",
		"Dell_Inspiron_Mini_Series" : 	"Dell Inspiron Mini Series",
		"Dell_Latitude" : 	"Dell Latitude",
		"Latitude_ON" : 	"Latitude ON",
		"Dell_Studio" : 	"Dell Studio",
		"Dell_Vostro" : 	"Dell Vostro",
		"Dell_XPS" : 	"Dell XPS",
		"modelOther": "other"
		};
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(dell_comp_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "apple")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
	 //apple computer
		var apple_comp_version = {
		"Timeline_of_the_Apple_II_family" :	"Timeline of the Apple II family",
		"Apple_II" :	"Apple II",
		"Apple_II_series" :	"Apple II series",
		"Apple_IIc" :	"Apple IIc",
		"Apple_IIc_Plus" :	"Apple IIc Plus",
		"Composite_artifact_colors" :	"Composite artifact colors",
		"Apple_IIe" :	"Apple IIe",
		"Apple_IIGS" :	"Apple IIGS",
		"Apple_II_Plus" :	"Apple II Plus",
		"Macintosh_Classic_II" :	"Macintosh Classic II",
		"Macintosh_Color_Classic" :	"Macintosh Color Classic",
		"EMac" :	"EMac",
		"IBook" :	"IBook",
		"Mac_Pro" :	"Mac Pro",
		"MacBook" :	"MacBook",
		"MacBook_family" :	"MacBook family",
		"MacBook_Pro" :	"MacBook Pro",
		"Mac_Mini" :	"Mac Mini",
		"Macintosh_Portable" :	"Macintosh Portable",
		"Macintosh_SE_30" :	"Macintosh SE/30",
		"modelOther" : "other"
	 }
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(apple_comp_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "acer")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      var acer_comp_version = {
		"Acer_Aspire_8920" : "Acer Aspire 8920",
		"Acer_Extensa" : "Acer Extensa",
		"Acer_TravelMate" : "Acer TravelMate",
		"modelOther": "other"
	   };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(acer_comp_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "samsung")) {
    	$("input#eBrand-other").hide(); //hide the input element for entering the electronic brand manually
      var samsung_comp_version = {
		"ATIV_Book_9" : "ATIV Book 9",
		"Samsung_Ativ_Q" : "Samsung Ativ Q",
		"Samsung_Ativ_Tab" : "Samsung Ativ Tab",
		"Samsung_Ativ_Tab_3" : "Samsung Ativ Tab 3",
		"Samsung_Ativ_Tab_5" : "Samsung Ativ Tab 5",
		"Samsung_Ativ_Tab_7" : "Samsung Ativ Tab 7",
		"Samsung_Galaxy_Note_10.1" : "Samsung Galaxy Note 10.1",
		"Samsung_Galaxy_Note_10.1_2014_Edition" : "Samsung Galaxy Note 10.1 2014 Edition",
		"Samsung_Galaxy_Note_8.0" : "Samsung Galaxy Note 8.0",
		"Samsung_Galaxy_Note_Pro_12.2" : "Samsung Galaxy Note Pro 12.2",
		"Samsung_Galaxy_Tab_7.0_Plus" : "Samsung Galaxy Tab 7.0 Plus",
		"Samsung_Galaxy_Tab_Pro_10.1" : "Samsung Galaxy Tab Pro 10.1",
		"Samsung_Galaxy_Tab_Pro_12.2" : "Samsung Galaxy Tab Pro 12.2",
		"Samsung_N130" : "Samsung N130",
		"Samsung_NC10" : "Samsung NC10",
		"Samsung_NC20" : "Samsung NC20",
		"Nexus_10" : "Nexus 10",
		"NP300E5A-A01UB" : "NP300E5A-A01UB",
		"Samsung_Q1" : "Samsung Q1",
		"Samsung_Sens" : "Samsung Sens",
		"Samsung_X360" : "Samsung X360",
		"modelOther": "other"
	   };
      $el.empty().append(firstOption); // remove old options exept the first element
      $el.append
      $.each(samsung_comp_version, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if (($("#electroKind").val() === "computer")&&($("#electroBrand").val() === "brandOther")) {
     $("input#eBrand-other").show(); //show the input element for entering the electronic brand manually
    };
  });
}

//select options
function select_kind(){
$("#electroKind").click(function() {

   var $el = $("#electroBrand");
   var firstOption = $("#electroBrand option:first-child");

   if($("#electroKind").val() === "computer"){
   	 $("input#eKind-other").hide(); //hide the input element for entering the electronic kind manually
     var computer_brand={
       "hp" : "hp", "toshiba" : "Toshiba", "apple" : "Apple",
       "samsung" : "Samsung", /* "sony": "Sony",*/ "acer": "Acer",
       "dell": "Dell",  "brandOther": "other"
      };
     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(computer_brand, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    }else if ($("#electroKind").val() === "phone") {
     $("input#eKind-other").hide(); //hide the input element for entering the electronic kind manually
      var phone_brand ={
       "iphone" : "Iphone", "samsung" : "Samsung",  "nokia" : "Nokia",
       "alcatel" : "Alcatel", "sony" : "Sony", "brandOther" : "other"
      };
     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(phone_brand, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    } else if ($("#electroKind").val() === "tv") {
     $("input#eKind-other").hide(); //hide the input element for entering the electronic kind manually
	 //list_of_the_best_tv_brand
	 var tv_brand = {
		"sony" :	"Sony",
		"samsung" :	"Samsung",
		"lg" :	"LG",
		"panasonic" :	"Panasonic",
		"sharp" :	"SHARP",
		"toshiba" :	"Toshiba",
		/*"Vizio" :	"Vizio",
		"Philips" :	"Philips",
		"Sanyo" :	"Sanyo",
		"TCL_Corporation" :	"TCL Corporation",
		"JVC" :	"JVC",
		"Bose_Corporation" :	"Bose Corporation",
		"Insignia_Systems :_Inc." :	"Insignia Systems, Inc.",
		"Hitachi_Data_Systems" :	"Hitachi Data Systems",
		"Fujitsu" :	"Fujitsu",
		"Element_Electronics" :	"Element Electronics",
		"Daewoo" :	"Daewoo",
		"General_Electric" :	"General Electric",
		"IZUMI_CO. :_LTD." :	"IZUMI CO., LTD.",
		"Bush" :	"Bush",
		"Luxor" :	"Luxor",
		"John_Lewis" :	"John Lewis",
		"Technika" :	"Technika",
		"Kogan" :	"Kogan",
		"Harvey_Industries" :	"Harvey Industries",
		"Logik" :	"Logik",*/
		"brandOther" : "other"
	 }
     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(tv_brand, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });
    /*}else if ($("#electroKind").val() === "tablet") {
      var tablet_brand={
       "hp" : "hp", "toshiba" : "Toshiba", "ipad" : "Panasonic",
       "samsung" : "Samsung", "sony": "Sony", "nokia": "Nokia",
       "tabletOther": "other"
      };
     $el.empty().append(firstOption); // remove old options exept the first element
     $el.append
     $.each(tablet_brand, function(value,key) {
       $el.append($("<option></option>").attr("value", value).text(key));
      });*/
    }else if ($("#electroKind").val() === "other"){
    	$("input#eKind-other").show(); //show the input element for entering the electronic kind manually
    };
  });
}



/*var toshiba_version ={
"Toshiba_Satellite_Laptops" : "Toshiba Satellite Laptops",
"A100_Series" : "A100 Series",
"A300_Series" : "A300 Series",
"A500_Series" : "A500 Series",
"C50_Series" : "C50 Series",
"C650_Series" : "C650 Series",
"C70_Series" : "C70 Series",
"C850_Series" : "C850 Series",
"C870_Series" : "C870 Series",
"CL10_Series" : "CL10 Series",
"Click_Series" : "Click Series",
"Click2_Series" : "Click2 Series",
"Click2Pro_Series" : "Click2Pro Series",
"E100_Series" : "E100 Series",
"E300_Series" : "E300 Series",
"E40_Series" : "E40 Series",
"E50_Series" : "E50 Series",
"L300_Series" : "L300 Series",
"L350_Series" : "L350 Series",
"L40_Series" : "L40 Series",
"L450_Series" : "L450 Series",
"L50_Series" : "L50 Series",
"L500_Series" : "L500 Series",
"L510_Series" : "L510 Series",
"L550_Series" : "L550 Series",
"L630_Series" : "L630 Series",
"L640_Series" : "L640 Series",
"L650_Series" : "L650 Series",
"L670_Series" : "L670 Series",
"L70_Series" : "L70 Series",
"L730_Series" : "L730 Series",
"L740_Series" : "L740 Series",
"L750_Series" : "L750 Series",
"L770_Series" : "L770 Series",
"L850-Series" : "L850-Series",
"L870_Series" : "L870 Series",
"L950_Series" : "L950 Series",
"M300_Series" : "M300 Series",
"M500_Series" : "M500 Series",
"M640_Series" : "M640 Series",
"NB10_Series" : "NB10 Series",
"P200_Series" : "P200 Series",
"P300_Series" : "P300 Series",
"P50_Series" : "P50 Series",
"P500_Series" : "P500 Series",
"P70_Series" : "P70 Series",
"P740_Series" : "P740 Series",
"P750_Series" : "P750 Series",
"P770_Series" : "P770 Series",
"P840_Series" : "P840 Series",
"R840_Series" : "R840 Series",
"Radius_Series" : "Radius Series",
"Radius11_Series" : "Radius11 Series",
"S50_Series" : "S50 Series",
"S70_Series" : "S70 Series",
"S850_Series" : "S850 Series",
"T110_Series" : "T110 Series",
"T130_Series" : "T130 Series",
"T210_Series" : "T210 Series",
"T230_Series" : "T230 Series",
"U300_Series" : "U300 Series",
"U400_Series" : "U400 Series",
"U500_Series" : "U500 Series",
"U840_Series" : "U840 Series",
"U840W_Series" : "U840W Series",
"U920T_Series" : "U920T Series",
"U940_Series" : "U940 Series",
"X200_Series" : "X200 Series",
"Toshiba_Satellite_Pro_Laptops" : "Toshiba Satellite Pro Laptops",
"C650_Series" : "C650 Series",
"L350_Series" : "L350 Series",
"L450_Series" : "L450 Series",
"S300_Series" : "S300 Series",
"S300M_Series" : "S300M Series",
"T110_Series" : "T110 Series",
"U400_Series" : "U400 Series",
"U500_Series" : "U500 Series",

"Toshiba_Tecra_Laptops" : "Toshiba Tecra Laptops",
"A50_Series" : "A50 Series",
"C50_Series" : "C50 Series",
"R940_Series" : "R940 Series",
"R950_Series" : "R950 Series",
"W50_Series" : "W50 Series",
"Z40_Series" : "Z40 Series",
"Z50_Series" : "Z50 Series",

"Toshiba_Qosmio_Laptops" : "Toshiba Qosmio Laptops",
"X300_Series" : "X300 Series",
"X70_Series" : "X70 Series",
"X770_Series" : "X770 Series",

"Toshiba_Portege_Laptops" : "Toshiba Portege Laptops",
"M750_Series" : "M750 Series",
"M780_Series" : "M780 Series",
"R30_Series" : "R30 Series",
"R400_Series" : "R400 Series",
"R400-S4834" : "R400-S4834",
"R500_Series" : "R500 Series",
"R600_Series" : "R600 Series",
"R700_Series" : "R700 Series",
"R830_Series" : "R830 Series",
"Z10t_Series" : "Z10t Series",
"Z30_Series" : "Z30 Series",
"Z930_Series" : "Z930 Series",

"Toshiba_mini_notebook_Laptops" : "Toshiba mini notebook Laptops",
"NB200_Series" : "NB200 Series",
"NB300_Series" : "NB300 Series",

"Toshiba_Chromebook_Laptops" : "Toshiba Chromebook Laptops",
"cb30_Series" : "cb30 Series",
"cb30-2_Series" : "cb30-2 Series",
"cb30-2hd_Series" : "cb30-2hd Series",

"Toshiba_KIRA™_Laptops" : "Toshiba KIRA™ Laptops",
"kirabook13_Series" : "kirabook13 Series",

"Toshiba_Notebook_PCs_Laptops" : "Toshiba Notebook PCs Laptops",
"satellite_Series" : "satellite Series"
}
*/

