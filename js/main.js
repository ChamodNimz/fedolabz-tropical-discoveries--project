
//date time select night days count

  $('#departure_date').on("change",function(){

      var depDate =$(this).val();
      var arriveDate = $('#arrival_date').val();
      var diff =  Math.floor(( Date.parse(depDate) - Date.parse(arriveDate) ) / 86400000);
      $('#nightDays').val(diff);

  });



//ajax call to get hotelId
$(document).ready(function(){
  $('#hotelName').on('change',function(){

    var hotelName=this.value;
    var obj = {"hotelName":hotelName};

    $.ajax({
      url:'Ajax/voucherNoGen.php',
      method:'post',
      data:obj,
      success:function(data){

        var obj=JSON.parse(data);
        var count= parseInt(obj.count) +1;
        $('#hotelCode').html(obj.hotelCode);
        $('#voucherCount').html(count);
        $('#voucherNo').attr("value",$('#voucherNoLabel').text());

      },
      error: function(){

      }
    });
  });
});


//front end cart-table creation
$(document).ready(function(){
  $('#btnAdd').click(function(){

    //random id gen for input id to select uniquely
    var random=Math.random();
    random=random.toString();
    var id=random.substring(2,random.length);

    //cart-table creation
    $('#cart-table tbody').append(
      '<tr role="row" class="odd">'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#roomCatogary").find(":selected").val()+'"></td>'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#mealPlan").find(":selected").val()+'"></td>'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#roomType").find(":selected").val()+'"></td>'+   
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$('#arrival_date').val()+'"></td>'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#departure_date").val()+'"></td>'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#night").find(":selected").val()+'"></td>'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#rooms").find(":selected").val()+'"></td>'+
      '<td><input class="form-control" required readonly name="row[]" id="" value="'+$("#rate").val()+'"></td>'+
      '</tr>');

    //fields clear
    $('#arrival_date').val("");//date clear
    $('#departure_date').val("");//depart date
    $('#roomType').val("");
    $('#roomCatogary').val("");
    $('#night').val("");
    $('#rate').val("");
    $('#rooms').val("");
    $('#mealPlan').val("");


  });
});

//clear main fields and submit
function clearDataAndSubmit(){
  var frm = document.getElementById("newVoucherForm");
  $('#hotelName').val();
  $('#receivedFrom').val();
  $('#voucherNo').val();

  
  if($('#hotelName').val()!='' && $('#receivedFrom').val()!='' && $('#voucherNo').val()!=''){
    frm.submit();
    frm.reset();
  }
  else{
    alert("check form data : hotel Name, Received from and voucherNo should be selected");
  }
  
}

// remove table-item
function remove(id){
  //random unique variable genarated to identify the button

  $('#id'+id+'').remove();

}



//load data to amend page ajax call
$(document).ready(function(){
  $('#voucherNo').on('change',function(){
    var vNo = this.value;
    
    var obj={"no":vNo};
    var idh; //globle variable to store pending id of a voucher


    $.ajax({

      url:"Ajax/amendData.php",
      method:"post",
      data:obj,
      success:function(data){

        var obj = JSON.parse(data);
        idh = obj.ID_H;
        
          //var afterIdH = prev+1;
          $('#receivedFrom').val(obj.receivedFrom);
          $('#hotelName').val(obj.hotelName);
          $('#amendCount').val(parseInt(obj.cnt)+1);
          $('#gusetName').val(obj.guestName);
          $('#Extra').val(obj.extra);
          $('#message').val(obj.specialRequests);
          $('#nationality').val(obj.nationalty);
          $('#departure_date').val(obj.departureDate);
          $("#title option[value='"+obj.typeName+"']").attr('selected','selected'); 
          $("#nationality option[value='"+obj.nationality+"']").attr('selected','selected');
          $("#receivedCode").val(obj.receivedCode); 

          //second ajax call to load the data table from voucherd
          var objIdh={"ih":idh};

          $.ajax({

            url:"Ajax/amendTable.php",
            method:"post",
            data:objIdh,
            success:function(table){

             // $('#cart-table tbody').append(table);

             var jsonObj = JSON.parse(table);
             
             var t = $('#cart-table').DataTable();//variable  of cart-table
            
              //clear data before adding
              t.clear().draw();
             for (var i =0;i<jsonObj.length; i++) {

              //use only one loop thus this is a smaller array therefor overhead will be reduced
                t.row.add([
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][1]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][2]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][0]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][3]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][4]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][5]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][7]+'">',
                '<input class="form-control" required readonly name="row[]" id="" value="'+jsonObj[i][6]+'">'
                ] ).draw( false );

            }


          },
          error:function(){
            console.log("error occured..!");
          }

        });

        },
        error:function(){
          console.log("error occured");
        }

      });

  });
});


//load data to cancel form ajax call
var cancelId;//this is common to cancellation and confirmation pages
$(document).ready(function(){
  $('#voucherNoCancel').on("change",function(){

    var vNo = this.value;
    var obj = {"no":vNo};

    //to get headr details
    $.ajax({

      url:"Ajax/cancelDataHeader.php",
      method:"post",
      data:obj,
      success:function(data){

        var obj=JSON.parse(data);
        cancelId=obj.ID_H;
        $('#receivedFrom').val(obj.receivedFrom);
        $('#hotelName').val(obj.hotelName);
        $('#confCode').val(obj.conformationCode);

      },
      error:function(){
        console.log("error occured");
      }
    });

//to get table details
$.ajax({

  url:"Ajax/cancelData.php",
  method:"post",
  data:obj,
  success:function(datatable){
    $('#table-cancel-data').children().remove();
    $('#table-cancel-data').append(datatable);

  },
  error:function(){
    console.log("error occured");
  }
});

});
});

//cancel a booking ajax
$(document).ready(function(){
  $('#btnCancel').click(function(){

    var obj = {"id":cancelId};

    if(confirm("are you sure you want to cancel ?")){

      $.ajax({

      url:"Ajax/cancel.php",
      method:"post",
      data:obj,
      success:function(data){
        if(parseInt(data)==1){
          alert("successfully cancelled voucher No : "+cancelId);  
          cancelId=0;
          location.reload();
        }
        else{
          alert("Error while cancelling");
        }
      },
      error:function(){
        alert("Error while cancelling");
      }
    });

    }

  });
});

//finish a booking ajax
$(document).ready(function(){
  $('#btnFinish').click(function(){

    var obj = {"id":cancelId};

    $.ajax({

      url:"Ajax/finish.php",
      method:"post",
      data:obj,
      success:function(data){
        if(parseInt(data)==1){
          alert("successfully finished voucher No : "+cancelId);  
          cancelId=0;
          location.reload();
        }
        else{
          alert("Error while cancelling");
        }
      },
      error:function(){
        alert("Error while cancelling");
      }
    });

  });
});

//confirmation code injection ajax
$(document).ready(function(){
  $('#btnConfirm').click(function(){

   if($('#confCode').val()!=''){
    var obj = {
      "id":cancelId,
      "code":$('#confCode').val()
    };

    $.ajax({

      url:"Ajax/confirm.php",
      method:"post",
      data:obj,
      success:function(data){
        if(parseInt(data)==1){
          alert("successfully confirmed voucher No : "+cancelId);  
          cancelId=0;
          location.reload();
        }
        else{
          alert("Error while cancelling");
        }
      },
      error:function(){
        alert("Error while cancelling");
      }
    });
  }
  else{
    alert("enter a confirm code");
  }
  

});
});





(function($) {

	'use strict';

	// bootstrap dropdown hover

  // loader
  var loader = function() {
    setTimeout(function() { 
      if($('#loader').length > 0) {
        $('#loader').removeClass('show');
      }
    }, 1);
  };
  loader();

  // Stellar
  $(window).stellar();


  $('nav .dropdown').hover(function(){
    var $this = $(this);
    $this.addClass('show');
    $this.find('> a').attr('aria-expanded', true);
    $this.find('.dropdown-menu').addClass('show');
  }, function(){
    var $this = $(this);
    $this.removeClass('show');
    $this.find('> a').attr('aria-expanded', false);
    $this.find('.dropdown-menu').removeClass('show');
  });


  $('#dropdown04').on('show.bs.dropdown', function () {
   console.log('show');
 });



	// home slider
	$('.home-slider').owlCarousel({
    loop:true,
    autoplay: true,
    margin:10,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav:true,
    autoplayHoverPause: true,
    items: 1,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:1,
        nav:false
      },
      1000:{
        items:1,
        nav:true
      }
    }
  });

	// owl carousel
	var majorCarousel = $('.js-carousel-1');
	majorCarousel.owlCarousel({
    loop:true,
    autoplay: false,
    stagePadding: 0,
    margin: 10,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav: false,
    dots: false,
    autoplayHoverPause: false,
    items: 3,
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:2,
        nav:false
      },
      1000:{
        items:3,
        nav:true,
        loop:false
      }
    }
  });

  // cusotm owl navigation events
  $('.custom-next').click(function(event){
    event.preventDefault();
    // majorCarousel.trigger('owl.next');
    majorCarousel.trigger('next.owl.carousel');

  });
  $('.custom-prev').click(function(event){
    event.preventDefault();
    // majorCarousel.trigger('owl.prev');
    majorCarousel.trigger('prev.owl.carousel');
  });

	// owl carousel
	var major2Carousel = $('.js-carousel-2');
	major2Carousel.owlCarousel({
    loop:true,
    autoplay: true,
    stagePadding: 7,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav: false,
    autoplayHoverPause: true,
    items: 4,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:3,
        nav:false
      },
      1000:{
        items:4,
        nav:true,
        loop:false
      }
    }
  });




	var contentWayPoint = function() {
		var i = 0;
		$('.element-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('element-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .element-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn element-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft element-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight element-animated');
							} else {
								el.addClass('fadeInUp element-animated');
							}
							el.removeClass('item-animate');
						},  k * 100);
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();



})(jQuery);

// var index; var table=document.getElementById('table');
// for(var i=1; i < table.rows.length; i++)
// {
//   table.rows[i].cells[4].onclick =function()
//   {
//     index=this.parentElement.rowIndex;
//     table.deleteRow(index);
//     console.log(index);
//   };

//}


