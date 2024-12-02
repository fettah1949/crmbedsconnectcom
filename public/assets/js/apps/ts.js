$(document).ready(function() {

  checkall('contact-check-all', 'contact-chkbox');

  $('#input-search').on('keyup', function() {
    var rex = new RegExp($(this).val(), 'i');
      $('.searchable-items .items:not(.items-header-section)').hide();
      $('.searchable-items .items:not(.items-header-section)').filter(function() {
          return rex.test($(this).text());
      }).show();

  });


class TextArea{

  constructor(parent,modal,itemField,attributes,modalAttribute){
    this.itemField = itemField;
    this.attributes = attributes;
    this.modalAttribute = modalAttribute;

    this.getParentItem = parent;
    this.getModal = modal;

    // Get List Item Fields
    this.ITF = this.getParentItem.find( this.itemField);
    // Get Attributes
    this.AttValue = this.ITF.attr(this.attributes);
    // Get Modal Attributes
    this.ModalInput = this.getModal.find(this.modalAttribute);
    // Set Modal Field's Value
    this.set = this.ModalInput.val(this.AttValue);
  }

  GetInfo(Parent){
    this.getInput = Parent.find(this.modalAttribute);
    this.getInputVal = this.getInput.val();
    this.ITF.text(this.getInputVal);
    this.ITF.attr(this.attributes, this.getInputVal);

  }
}

function editContact() {

  $('.edit').on('click', function(event) {

    $('#editReservation #btn-edit').show();

    // Get Parents
    var getParentItem = $(this).parents('.res_tab');
    var getModal = $('#editReservation');

    M_tgx = new TextArea(getParentItem,getModal,'.tgx','reservation-tgx','#c-tgx');
    M_hotelCode = new TextArea(getParentItem,getModal,'.hotelCode','reservation-hotelCode','#c-hotelCode');
    M_MainGuestName = new TextArea(getParentItem,getModal,'.mainGuestName','reservation-mainGuestName','#c-mainGuestName');
    M_bookingDate = new TextArea(getParentItem,getModal,'.bookingDate','reservation-bookingDate','#c-bookingDate');
    M_sellingPrice_amount = new TextArea(getParentItem,getModal,'.sellingPrice_amount','reservation-sellingPrice_amount','#c-sellingPrice_amount');
    M_providerPrice_amount = new TextArea(getParentItem,getModal,'.providerPrice_amount','reservation-providerPrice_amount','#c-providerPrice_amount');
    M_checkinDate = new TextArea(getParentItem,getModal,'.checkinDate','reservation-checkinDate','#c-CheckinDate');
    M_checkoutDate = new TextArea(getParentItem,getModal,'.checkoutDate','reservation-checkoutDate','#c-CheckoutDate');
    M_CancelationDate = new TextArea(getParentItem,getModal,'.cancelationDate','reservation-cancelationDate','#c-cancelation_date');
    M_CancelationPrice = new TextArea(getParentItem,getModal,'.cancelationPrice','reservation-cancelationPrice','#c-cancelation_price');
    M_Fournisseur = new TextArea(getParentItem,getModal,'.providerName','reservation-providerName','#c-providerName');
  
    
    $('#editReservation').modal('show');




    $("#btn-edit").off('click').click(function(){

      var getParent = $(this).parents('.modal-content');
      
      M_tgx.GetInfo(getParent);
      M_hotelCode.GetInfo(getParent);
      M_MainGuestName.GetInfo(getParent);
      M_bookingDate.GetInfo(getParent);
      M_sellingPrice_amount.GetInfo(getParent);
      M_providerPrice_amount.GetInfo(getParent);
      M_checkinDate.GetInfo(getParent);
      M_checkoutDate.GetInfo(getParent);
      M_CancelationDate.GetInfo(getParent);
      M_CancelationPrice.GetInfo(getParent);
      M_Fournisseur.GetInfo(getParent);
      
      $.ajax({
          url: "reservation", //this is the submit URL
          type: 'POST', //or POST
          data: $('#addContactModalTitle').serialize()
      });

      $('#editReservation').modal('hide');
    });
  })
}

editContact();

})






// Validation Process

var $_getValidationField = document.getElementsByClassName('validation-text');
var reg = /^.+@[^\.].*\.[a-z]{2,}$/;
var phoneReg = /^\d{10}$/;


