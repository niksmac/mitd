(function ($) {

  Drupal.behaviors.international_phone = {
    attach: function (context, settings) {
      $(".international_phone-number").intlTelInput({
      	onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk", "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv", "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro", "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "us", "gb", "in"],
      	preferredCountries: ["us", "in", "gb"],
      	initialCountry: "in",
      	separateDialCode: true,
      	autoFormat: true
        //utilsScript: "lib/libphonenumber/build/utils.js"
      });
    }
  };

}(jQuery));
