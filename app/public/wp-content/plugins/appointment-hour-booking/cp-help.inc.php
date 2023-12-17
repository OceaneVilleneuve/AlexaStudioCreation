<?php if ( !is_admin() ) {echo 'Direct access not allowed.';exit;} ?>

<h1><?php _e('Knowledge base and support','appointment-hour-booking'); ?></h1>

<p>If the answer to your question doesn't appear in this section (try first the search option below) then contact our support service:</p>
<input type="button" value="<?php _e('Contact Support Service','appointment-hour-booking'); ?>" onclick="window.open('https://wordpress.org/support/plugin/appointment-hour-booking#new-post');" class="button button-primary ahb-first-button" />


<hr / >
<!-- START:: help contents area -->

<h2>Search Help:</h2>

<style>
a { color: #0000dd; } 
ol {
  column-count: 2;
 
}
ol.cat {
  column-count: 4;

}
.highlight {
  background-color: yellow;
}
</style>


<script>

function myFunction() {
  const input = document.getElementById("myInput"),
    filter = input.value.toUpperCase();
    
    var table = document.getElementById("myTable1");
    filterTableRows(table, filter);
    
    table = document.getElementById("myTable2");
    filterTableRows(table, filter); 
    
    table = document.getElementById("myTable3");
    filterTableRows(table, filter);    
    var html = document.getElementById("searchContent").innerHTML+"";
    document.getElementById("searchContent").innerHTML = html.replace(/<\/?span[^>]*>/g,"");
    highlight(document.getElementById("searchContent"), [filter]);
}

function filterTableRows(table, filter) {
  const rows = table.getElementsByTagName('tr');
  let hiddenRows = 0;

  for (let rowIndex = 0; rowIndex < rows.length; rowIndex++) {

    let show = false;
    const columns = rows[rowIndex].getElementsByTagName('td');

    for (let columnIndex = 0; columnIndex < columns.length; columnIndex++) {

      const innerTables = columns[columnIndex].getElementsByTagName('table');

      if (innerTables.length) {
        for (let tableIndex = 0; tableIndex < innerTables.length; tableIndex++) {
          if ( ! filterTableRows(innerTables[tableIndex], filter)) {
            show = true;
          }
        }
      } else {
        let txtValue = columns[columnIndex].textContent || columns[columnIndex].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          show = true;
        }

      }
    }

    if (show) {
      rows[rowIndex].style.display = "";
      for (let columnIndex = 0; columnIndex < columns.length; columnIndex++) {
        const innerTables = columns[columnIndex].getElementsByTagName('table');
        if (innerTables.length) {
          for (let tableIndex = 0; tableIndex < innerTables.length; tableIndex++) {
            showTable(innerTables[tableIndex]);
          }
        }
      }
    } else {
      rows[rowIndex].style.display = "none";
      hiddenRows++;
    }

  }


  return hiddenRows == rows.length;
}

function showTable(table) {
  const rows = table.getElementsByTagName('tr');
  for (let rowIndex = 0; rowIndex < rows.length; rowIndex++) {
    rows[rowIndex].style.display = "";
  }
}


function highlight(elem, keywords, caseSensitive = false, cls = 'highlight') {
  const flags = !caseSensitive ? 'gi' : 'g';

  // Sort longer matches first to avoid
  // highlighting keywords within keywords.
  keywords.sort((a, b) => b.length - a.length);
  Array.from(elem.childNodes).forEach(child => {
    const keywordRegex = RegExp(keywords.join('|'), flags);
    if (child.nodeType !== 3) { // not a text node
      highlight(child, keywords, caseSensitive, cls);
    } else if (keywordRegex.test(child.textContent)) {
        //console.log(child.textContent);
      const frag = document.createDocumentFragment();
      let lastIdx = 0;
      child.textContent.replace(keywordRegex, (match, idx) => {
        const part = document.createTextNode(child.textContent.slice(lastIdx, idx));
        const highlighted = document.createElement('span');
        highlighted.textContent = match;
        highlighted.classList.add(cls);
        frag.appendChild(part);
        frag.appendChild(highlighted);
        lastIdx = idx + match.length;
      });
      const end = document.createTextNode(child.textContent.slice(lastIdx));
      frag.appendChild(end);
      child.parentNode.replaceChild(frag, child);
    }
  });
}

</script>
  
<input type="text" size="20" id="myInput" onkeyup="myFunction()" placeholder="type search keyword...">
<br><em>Use single keywords for the search, example: Calendar, Google, time, email, price ...</em>

<div id="searchContent">
<h2>Cases of use & documentation</h2><table id="myTable1"><tr><td style="margin-top:5px;">1 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/05/custom-statuses" target="_blank">Adding custom statuses for the bookings
</a></td></tr><tr><td style="margin-top:5px;">2 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/10/data-lookup-and-autofilling-fields" target="_blank">Data-lookup and auto-filling form fields
</a></td></tr><tr><td style="margin-top:5px;">3 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/12/edition-booking-modification-by-customers-addon" target="_blank">Edition / Booking modification for customers
</a></td></tr><tr><td style="margin-top:5px;">4 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/15/qrcode-image-barcode-add-on" target="_blank">Using the QRCode Image - Barcode add-on
</a></td></tr><tr><td style="margin-top:5px;">5 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/20/sharing-booked-times-between-calendars" target="_blank">Sharing booked times between different calendars
</a></td></tr><tr><td style="margin-top:5px;">6 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/24/auto-select-time" target="_blank">Auto-select the only available time for a date
</a></td></tr><tr><td style="margin-top:5px;">7 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/26/change-max-quantity" target="_blank">Changing the selectable max quantity in the booking form
</a></td></tr><tr><td style="margin-top:5px;">8 - <a href="https://apphourbooking.dwbooster.com/blog/2018/01/30/sms-with-mmdsmart" target="_blank">SMS notification for bookings with the MMD Smart service
</a></td></tr><tr><td style="margin-top:5px;">9 - <a href="https://apphourbooking.dwbooster.com/blog/2018/02/10/address-auto-complete-google-maps" target="_blank">Address auto-complete fields using the Google Maps API
</a></td></tr><tr><td style="margin-top:5px;">10 - <a href="https://apphourbooking.dwbooster.com/blog/2018/02/15/require-quantity-selection" target="_blank">Require explicit quantity selection
</a></td></tr><tr><td style="margin-top:5px;">11 - <a href="https://apphourbooking.dwbooster.com/blog/2018/03/27/password-addon" target="_blank">Requesting a password for appointments
</a></td></tr><tr><td style="margin-top:5px;">12 - <a href="https://apphourbooking.dwbooster.com/blog/2018/05/15/integration-with-calculated-fields-form" target="_blank">Integration of the Appointment Hour Booking with the Calculated Fields Form plugin
</a></td></tr><tr><td style="margin-top:5px;">13 - <a href="https://apphourbooking.dwbooster.com/blog/2018/09/15/remove-or-ignore-old-bookings" target="_blank">Remove or Ignore Old Bookings
</a></td></tr><tr><td style="margin-top:5px;">14 - <a href="https://apphourbooking.dwbooster.com/blog/2018/10/02/price-linked-to-slots-number" target="_blank">Setting different prices per number of time-slots selected
</a></td></tr><tr><td style="margin-top:5px;">15 - <a href="https://apphourbooking.dwbooster.com/blog/2018/10/03/price-linked-to-quantity" target="_blank">Setting different prices per quantity
</a></td></tr><tr><td style="margin-top:5px;">16 - <a href="https://apphourbooking.dwbooster.com/blog/2018/10/04/quantity-dependant-fields" target="_blank">Adding quantity dependent fields
</a></td></tr><tr><td style="margin-top:5px;">17 - <a href="https://apphourbooking.dwbooster.com/blog/2018/10/05/service-dependant-fields" target="_blank">Adding service dependent fields
</a></td></tr><tr><td style="margin-top:5px;">18 - <a href="https://apphourbooking.dwbooster.com/blog/2018/10/07/posting-text-instead-value" target="_blank">Posting the dropdown, radiobutton and checkboxes text instead value
</a></td></tr><tr><td style="margin-top:5px;">19 - <a href="https://apphourbooking.dwbooster.com/blog/2018/10/30/appointment-form-with-woocommerce" target="_blank">Appointment booking form with WooCommerce
</a></td></tr><tr><td style="margin-top:5px;">20 - <a href="https://apphourbooking.dwbooster.com/blog/2018/11/01/schedule-calendar-contents-customization" target="_blank">Customizing the schedule calendar contents and colors
</a></td></tr><tr><td style="margin-top:5px;">21 - <a href="https://apphourbooking.dwbooster.com/blog/2018/11/02/customizing-styles" target="_blank">How to customize the booking form styles?
</a></td></tr><tr><td style="margin-top:5px;">22 - <a href="https://apphourbooking.dwbooster.com/blog/2018/11/10/logged-in-users-booking" target="_blank">Creating a booking form for logged in users
</a></td></tr><tr><td style="margin-top:5px;">23 - <a href="https://apphourbooking.dwbooster.com/blog/2018/11/28/coupon-codes-addon" target="_blank">Using the coupon codes add-on in the Appointment Hour Booking plugin.
</a></td></tr><tr><td style="margin-top:5px;">24 - <a href="https://apphourbooking.dwbooster.com/blog/2018/12/19/adding-google-iphone-outlook" target="_blank">Adding the appointments to Google Calendar and iPhone/ iPad Calendars
</a></td></tr><tr><td style="margin-top:5px;">25 - <a href="https://apphourbooking.dwbooster.com/blog/2018/12/20/ical-import" target="_blank">Automatically importing/sync events from external calendars using iCal
</a></td></tr><tr><td style="margin-top:5px;">26 - <a href="https://apphourbooking.dwbooster.com/blog/2018/12/24/conditional-rules" target="_blank">Using the conditional logic / dependent fields
</a></td></tr><tr><td style="margin-top:5px;">27 - <a href="https://apphourbooking.dwbooster.com/blog/2018/12/26/grouped-frontend-lists" target="_blank">How to display lists of bookings in the frontend?
</a></td></tr><tr><td style="margin-top:5px;">28 - <a href="https://apphourbooking.dwbooster.com/blog/2018/12/27/status-update-emails" target="_blank">Email notifications on booking status updates.
</a></td></tr><tr><td style="margin-top:5px;">29 - <a href="https://apphourbooking.dwbooster.com/blog/2018/12/28/additional-services" target="_blank">Adding additional items / extras with prices to the booking form
</a></td></tr><tr><td style="margin-top:5px;">30 - <a href="https://apphourbooking.dwbooster.com/blog/2019/01/10/double-opt-in-addon" target="_blank">Double opt-in verification links
</a></td></tr><tr><td style="margin-top:5px;">31 - <a href="https://apphourbooking.dwbooster.com/blog/2019/01/11/timezone-conversion" target="_blank">Timezone Conversion: Displaying the booking times converted to the customer time zone
</a></td></tr><tr><td style="margin-top:5px;">32 - <a href="https://apphourbooking.dwbooster.com/blog/2019/01/24/bookings-for-multiple-persons" target="_blank">Allowing bookings for multiple persons
</a></td></tr><tr><td style="margin-top:5px;">33 - <a href="https://apphourbooking.dwbooster.com/blog/2019/05/11/booked-date-colors" target="_blank">Changing styles of the dates depending of the amount of booked/available bookings
</a></td></tr><tr><td style="margin-top:5px;">34 - <a href="https://apphourbooking.dwbooster.com/blog/2019/07/25/book-multiple-services-timeslot" target="_blank"> Booking multiple services for the same time slot
</a></td></tr><tr><td style="margin-top:5px;">35 - <a href="https://apphourbooking.dwbooster.com/blog/2020/04/18/google-calendar-api-connection" target="_blank">Setup of the Google Calendar API add-on
</a></td></tr><tr><td style="margin-top:5px;">36 - <a href="https://apphourbooking.dwbooster.com/blog/2021/05/12/minimum-available-time" target="_blank">Minimun available date: min time required before a booking
</a></td></tr></table><h2>FAQ</h2><table id="myTable2"><tr><td style="margin-top:5px;">1 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q94" class="collapsed" aria-expanded="false">General installation and upgrade instructions.</a>
						  </td></tr><tr><td style="margin-top:5px;">2 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q215" class="collapsed" aria-expanded="false">Where can I publish a appointment booking form?</a>
						  </td></tr><tr><td style="margin-top:5px;">3 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q316" class="collapsed" aria-expanded="false">Minimun available date: min time required before a booking</a>
						  </td></tr><tr><td style="margin-top:5px;">4 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q227" class="collapsed" aria-expanded="false">How to create multi-page forms?</a>
						  </td></tr><tr><td style="margin-top:5px;">5 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q222" class="collapsed" aria-expanded="false">How to display an image in a checkbox or radio button?</a>
						  </td></tr><tr><td style="margin-top:5px;">6 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q229" class="collapsed" aria-expanded="false">How to highlight the fields in the summary control?</a>
						  </td></tr><tr><td style="margin-top:5px;">7 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q249" class="collapsed" aria-expanded="false">How to insert a link in the form?</a>
						  </td></tr><tr><td style="margin-top:5px;">8 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q195" class="collapsed" aria-expanded="false">How to populate the fields with data stored in database?</a>
						  </td></tr><tr><td style="margin-top:5px;">9 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q82" class="collapsed" aria-expanded="false">How can I apply CSS styles to the form fields?</a>
						  </td></tr><tr><td style="margin-top:5px;">10 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q218" class="collapsed" aria-expanded="false">How to make the calendar 100% width / responsive?</a>
						  </td></tr><tr><td style="margin-top:5px;">11 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q219" class="collapsed" aria-expanded="false">How to change the calendar header row color?</a>
						  </td></tr><tr><td style="margin-top:5px;">12 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q240" class="collapsed" aria-expanded="false">How to center the submit button?</a>
						  </td></tr><tr><td style="margin-top:5px;">13 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q220" class="collapsed" aria-expanded="false">How to change the styles of the calendar day names?</a>
						  </td></tr><tr><td style="margin-top:5px;">14 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q221" class="collapsed" aria-expanded="false">How to change the styles of the calendar dates?</a>
						  </td></tr><tr><td style="margin-top:5px;">15 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q223" class="collapsed" aria-expanded="false">How to remove the calendar borders?</a>
						  </td></tr><tr><td style="margin-top:5px;">16 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q224" class="collapsed" aria-expanded="false">How to change the styles of the available slots?</a>
						  </td></tr><tr><td style="margin-top:5px;">17 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q228" class="collapsed" aria-expanded="false">How to change the styles of the used slots?</a>
						  </td></tr><tr><td style="margin-top:5px;">18 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q230" class="collapsed" aria-expanded="false">How to change the styles of the selected slots?</a>
						  </td></tr><tr><td style="margin-top:5px;">19 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q233" class="collapsed" aria-expanded="false">How assign multiple class names to a field?</a>
						  </td></tr><tr><td style="margin-top:5px;">20 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q237" class="collapsed" aria-expanded="false">Display fully-booked dates in different color.</a>
						  </td></tr><tr><td style="margin-top:5px;">21 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q312" class="collapsed" aria-expanded="false">How turn off the up/down arrows in the number fields?</a>
						  </td></tr><tr><td style="margin-top:5px;">22 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q66" class="collapsed" aria-expanded="false">How can I align the form using various columns?</a>
						  </td></tr><tr><td style="margin-top:5px;">23 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q275" class="collapsed" aria-expanded="false">How to replace submit button text to icon/image?</a>
						  </td></tr><tr><td style="margin-top:5px;">24 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q232" class="collapsed" aria-expanded="false">How to hide the fields on forms?</a>
						  </td></tr><tr><td style="margin-top:5px;">25 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q509" class="collapsed" aria-expanded="false">How to edit or remove the form title / header?</a>
						  </td></tr><tr><td style="margin-top:5px;">26 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q231" class="collapsed" aria-expanded="false">Is possible to modify any of predefined templates included with the plugin?</a>
						  </td></tr><tr><td style="margin-top:5px;">27 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q732" class="collapsed" aria-expanded="false">Is there a way to not have the ### ### #### in public phone field?</a>
						  </td></tr><tr><td style="margin-top:5px;">28 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q507" class="collapsed" aria-expanded="false">Can the emails be customized?</a>
						  </td></tr><tr><td style="margin-top:5px;">29 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q81" class="collapsed" aria-expanded="false">How can I add specific fields into the email message?</a>
						  </td></tr><tr><td style="margin-top:5px;">30 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q97" class="collapsed" aria-expanded="false">Can I add a reference to the item number (submission number) into the email?</a>
						  </td></tr><tr><td style="margin-top:5px;">31 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q160" class="collapsed" aria-expanded="false">How can I include the link to the uploaded file into the email message?</a>
						  </td></tr><tr><td style="margin-top:5px;">32 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q309" class="collapsed" aria-expanded="false">How to insert an image in the notification emails?</a>
						  </td></tr><tr><td style="margin-top:5px;">33 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q234" class="collapsed" aria-expanded="false">How to insert changes of lines in the notification emails, when the HTML format is selected?</a>
						  </td></tr><tr><td style="margin-top:5px;">34 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q512" class="collapsed" aria-expanded="false">How to highlight specific dates?</a>
						  </td></tr><tr><td style="margin-top:5px;">35 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q241" class="collapsed" aria-expanded="false">How to center the phone field?</a>
						  </td></tr><tr><td style="margin-top:5px;">36 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q252" class="collapsed" aria-expanded="false">How integrate the forms with the WooCommerce products?</a>
						  </td></tr><tr><td style="margin-top:5px;">37 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q315" class="collapsed" aria-expanded="false">How to customize the fields displayed in the cart page of WooCommerce?</a>
						  </td></tr><tr><td style="margin-top:5px;">38 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q272" class="collapsed" aria-expanded="false">How to export the submitted files to DropBox?</a>
						  </td></tr><tr><td style="margin-top:5px;">39 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q273" class="collapsed" aria-expanded="false">How to generate a PDF file with the submitted information, and send the file to the user?</a>
						  </td></tr><tr><td style="margin-top:5px;">40 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q274" class="collapsed" aria-expanded="false">How to use a file field with multiple selection from Zapier?</a>
						  </td></tr><tr><td style="margin-top:5px;">41 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q508" class="collapsed" aria-expanded="false">The form doesn't appear. Solution?</a>
						  </td></tr><tr><td style="margin-top:5px;">42 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q502" class="collapsed" aria-expanded="false">I'm not receiving the emails with the appointment data.</a>
						  </td></tr><tr><td style="margin-top:5px;">43 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q226" class="collapsed" aria-expanded="false">The form doesn't appear in the public website. Solution?</a>
						  </td></tr><tr><td style="margin-top:5px;">44 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q225" class="collapsed" aria-expanded="false">Non-latin characters aren't being displayed in the form. There is a workaround?</a>
						  </td></tr><tr><td style="margin-top:5px;">45 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q317" class="collapsed" aria-expanded="false">Getting unexpected cancellations through the cancellation add-on?</a>
						  </td></tr><tr><td style="margin-top:5px;">46 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q95" class="collapsed" aria-expanded="false">I'm getting this message: "Destination folder already exists". Solution?</a>
						  </td></tr><tr><td style="margin-top:5px;">47 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q214" class="collapsed" aria-expanded="false">Is the "Appointment Hour Booking" plugin compatible with "Autoptimize"?</a>
						  </td></tr><tr><td style="margin-top:5px;">48 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#qwr214" class="collapsed" aria-expanded="false">Is the plugin compatible with "WP Rocket"?</a>
						  </td></tr><tr><td style="margin-top:5px;">49 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q216" class="collapsed" aria-expanded="false">About the datasource fields.</a>
						  </td></tr><tr><td style="margin-top:5px;">50 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q235" class="collapsed" aria-expanded="false">Using the datasource to load the logged in user info.</a>
						  </td></tr><tr><td style="margin-top:5px;">51 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q217" class="collapsed" aria-expanded="false">Additional form CSS styles.</a>
						  </td></tr><tr><td style="margin-top:5px;">52 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q511" class="collapsed" aria-expanded="false">Can I display a list with the appointments?</a>
						  </td></tr><tr><td style="margin-top:5px;">53 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q304" class="collapsed" aria-expanded="false">Can I publish multiple calendars in the same page?</a>
						  </td></tr><tr><td style="margin-top:5px;">54 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q305" class="collapsed" aria-expanded="false">Can I add the submitted form data as parameters to the redirection "Thank you" page?</a>
						  </td></tr><tr><td style="margin-top:5px;">55 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q306" class="collapsed" aria-expanded="false">How to pre-select the service on different pages?</a>
						  </td></tr><tr><td style="margin-top:5px;">56 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q307" class="collapsed" aria-expanded="false">How to pre-fill the form fields in the public booking form?</a>
						  </td></tr><tr><td style="margin-top:5px;">57 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q308" class="collapsed" aria-expanded="false">Can I show capacity of service?</a>
						  </td></tr><tr><td style="margin-top:5px;">58 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q311" class="collapsed" aria-expanded="false">Can I hide the service drop-down?</a>
						  </td></tr><tr><td style="margin-top:5px;">59 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q314" class="collapsed" aria-expanded="false">How to modify the date format in the "Schedule Calendar view"?</a>
						  </td></tr><tr><td style="margin-top:5px;">60 - 
							<a data-toggle="collapse" target="_blank" href="https://apphourbooking.dwbooster.com/faq/#q310" class="collapsed" aria-expanded="false">Can I add a "reset" button for the form fields and selected times?</a>
						  </td></tr></table> 

<h2>Screenshots</h2><table id="myTable3"></tr><td style="margin-top:3px;">1 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/admin-only-field.png" target="_blank">admin only field</a></td></tr></tr><td style="margin-top:3px;">2 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/appointment-end-time.png" target="_blank">appointment end time</a></td></tr></tr><td style="margin-top:3px;">3 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/auto-focus-jump.png" target="_blank">auto focus jump</a></td></tr></tr><td style="margin-top:3px;">4 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/avoid-overlapping.png" target="_blank">avoid overlapping</a></td></tr></tr><td style="margin-top:3px;">5 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/confirmation-email-to-user.png" target="_blank">confirmation email to user</a></td></tr></tr><td style="margin-top:3px;">6 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/custom-css-editor.png" target="_blank">custom css editor</a></td></tr></tr><td style="margin-top:3px;">7 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/dashboard-documentation.png" target="_blank">dashboard documentation</a></td></tr></tr><td style="margin-top:3px;">8 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/dashboard-widget-enable.png" target="_blank">dashboard widget enable</a></td></tr></tr><td style="margin-top:3px;">9 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/dashboard-widget-settings.png" target="_blank">dashboard widget settings</a></td></tr></tr><td style="margin-top:3px;">10 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/dashboard-widget.png" target="_blank">dashboard widget</a></td></tr></tr><td style="margin-top:3px;">11 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/display-slot-capacity.png" target="_blank">display slot capacity</a></td></tr></tr><td style="margin-top:3px;">12 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/edit-feature.png" target="_blank">edit feature</a></td></tr></tr><td style="margin-top:3px;">13 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/equal-to-rule.png" target="_blank">equal to rule</a></td></tr></tr><td style="margin-top:3px;">14 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/exclude-csv-fields.png" target="_blank">exclude csv fields</a></td></tr></tr><td style="margin-top:3px;">15 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/giving-access-to-users.png" target="_blank">giving access to users</a></td></tr></tr><td style="margin-top:3px;">16 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/google-calendar-api.png" target="_blank">google calendar api</a></td></tr></tr><td style="margin-top:3px;">17 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/make-user-select-service.png" target="_blank">make user select service</a></td></tr></tr><td style="margin-top:3px;">18 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/min-date-hours.png" target="_blank">min date hours</a></td></tr></tr><td style="margin-top:3px;">19 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/recaptcha-keys.png" target="_blank">recaptcha keys</a></td></tr></tr><td style="margin-top:3px;">20 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/recurrent-panel.png" target="_blank">recurrent panel</a></td></tr></tr><td style="margin-top:3px;">21 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/repeat-and-statuses.png" target="_blank">repeat and statuses</a></td></tr></tr><td style="margin-top:3px;">22 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/required-field.png" target="_blank">required field</a></td></tr></tr><td style="margin-top:3px;">23 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/schedule-csv.png" target="_blank">schedule csv</a></td></tr></tr><td style="margin-top:3px;">24 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/schedule-data-settings.png" target="_blank">schedule data settings</a></td></tr></tr><td style="margin-top:3px;">25 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/setting-prices-and-duration.png" target="_blank">setting prices and duration</a></td></tr></tr><td style="margin-top:3px;">26 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/show-used-slots.png" target="_blank">show used slots</a></td></tr></tr><td style="margin-top:3px;">27 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/special-open-hours.png" target="_blank">special open hours</a></td></tr></tr><td style="margin-top:3px;">28 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/special-padding.png" target="_blank">special padding</a></td></tr></tr><td style="margin-top:3px;">29 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/start-weekday.png" target="_blank">start weekday</a></td></tr></tr><td style="margin-top:3px;">30 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/statuses.png" target="_blank">statuses</a></td></tr></tr><td style="margin-top:3px;">31 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/style-for-displaying-slots.png" target="_blank">style for displaying slots</a></td></tr></tr><td style="margin-top:3px;">32 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/thank-you-page.png" target="_blank">thank you page</a></td></tr></tr><td style="margin-top:3px;">33 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/time-format.png" target="_blank">time format</a></td></tr></tr><td style="margin-top:3px;">34 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/tooltip-contents.png" target="_blank">tooltip contents</a></td></tr></tr><td style="margin-top:3px;">35 - <a href="https://apphourbooking.dwbooster.com/customdownloads/./../images/articles/zoom-add-on-settings.png" target="_blank">zoom add on settings</a></td></tr></tr><td style="margin-top:3px;">36 - <a href="https://apphourbooking.dwbooster.com/customdownloads/Google-Calendar-Enable-API.png" target="_blank">Google Calendar Enable API</a></td></tr></tr><td style="margin-top:3px;">37 - <a href="https://apphourbooking.dwbooster.com/customdownloads/appointment-limits-per-user.png" target="_blank">appointment limits per user</a></td></tr></tr><td style="margin-top:3px;">38 - <a href="https://apphourbooking.dwbooster.com/customdownloads/attach-ical-file-emails.png" target="_blank">attach ical file emails</a></td></tr></tr><td style="margin-top:3px;">39 - <a href="https://apphourbooking.dwbooster.com/customdownloads/auth-net-addon.png" target="_blank">auth net addon</a></td></tr></tr><td style="margin-top:3px;">40 - <a href="https://apphourbooking.dwbooster.com/customdownloads/authorize.net.png" target="_blank">authorize.net</a></td></tr></tr><td style="margin-top:3px;">41 - <a href="https://apphourbooking.dwbooster.com/customdownloads/block-times.png" target="_blank">block times</a></td></tr></tr><td style="margin-top:3px;">42 - <a href="https://apphourbooking.dwbooster.com/customdownloads/booking-form-tooltip.png" target="_blank">booking form tooltip</a></td></tr></tr><td style="margin-top:3px;">43 - <a href="https://apphourbooking.dwbooster.com/customdownloads/booking-orders-list.png" target="_blank">booking orders list</a></td></tr></tr><td style="margin-top:3px;">44 - <a href="https://apphourbooking.dwbooster.com/customdownloads/calendar-admin-in-frontend.png" target="_blank">calendar admin in frontend</a></td></tr></tr><td style="margin-top:3px;">45 - <a href="https://apphourbooking.dwbooster.com/customdownloads/calendar-end-time.png" target="_blank">calendar end time</a></td></tr></tr><td style="margin-top:3px;">46 - <a href="https://apphourbooking.dwbooster.com/customdownloads/calendar-language.png" target="_blank">calendar language</a></td></tr></tr><td style="margin-top:3px;">47 - <a href="https://apphourbooking.dwbooster.com/customdownloads/cancellation-notification-emails.png" target="_blank">cancellation notification emails</a></td></tr></tr><td style="margin-top:3px;">48 - <a href="https://apphourbooking.dwbooster.com/customdownloads/cancellation-redirection-pages.png" target="_blank">cancellation redirection pages</a></td></tr></tr><td style="margin-top:3px;">49 - <a href="https://apphourbooking.dwbooster.com/customdownloads/captcha-settings.png" target="_blank">captcha settings</a></td></tr></tr><td style="margin-top:3px;">50 - <a href="https://apphourbooking.dwbooster.com/customdownloads/conditional-content-emails.png" target="_blank">conditional content emails</a></td></tr></tr><td style="margin-top:3px;">51 - <a href="https://apphourbooking.dwbooster.com/customdownloads/credits-purchase-add-on.png" target="_blank">credits purchase add on</a></td></tr></tr><td style="margin-top:3px;">52 - <a href="https://apphourbooking.dwbooster.com/customdownloads/css-additional-class.png" target="_blank">css additional class</a></td></tr></tr><td style="margin-top:3px;">53 - <a href="https://apphourbooking.dwbooster.com/customdownloads/csv-char-encoding.png" target="_blank">csv char encoding</a></td></tr></tr><td style="margin-top:3px;">54 - <a href="https://apphourbooking.dwbooster.com/customdownloads/currency-setting.png" target="_blank">currency setting</a></td></tr></tr><td style="margin-top:3px;">55 - <a href="https://apphourbooking.dwbooster.com/customdownloads/default-date.png" target="_blank">default date</a></td></tr></tr><td style="margin-top:3px;">56 - <a href="https://apphourbooking.dwbooster.com/customdownloads/delete-field.png" target="_blank">delete field</a></td></tr></tr><td style="margin-top:3px;">57 - <a href="https://apphourbooking.dwbooster.com/customdownloads/deposits-payments.png" target="_blank">deposits payments</a></td></tr></tr><td style="margin-top:3px;">58 - <a href="https://apphourbooking.dwbooster.com/customdownloads/elementor.png" target="_blank">elementor</a></td></tr></tr><td style="margin-top:3px;">59 - <a href="https://apphourbooking.dwbooster.com/customdownloads/email-blacklist.png" target="_blank">email blacklist</a></td></tr></tr><td style="margin-top:3px;">60 - <a href="https://apphourbooking.dwbooster.com/customdownloads/email-from-name.png" target="_blank">email from name</a></td></tr></tr><td style="margin-top:3px;">61 - <a href="https://apphourbooking.dwbooster.com/customdownloads/email-settings.png" target="_blank">email settings</a></td></tr></tr><td style="margin-top:3px;">62 - <a href="https://apphourbooking.dwbooster.com/customdownloads/enable-google-api-addon.png" target="_blank">enable google api addon</a></td></tr></tr><td style="margin-top:3px;">63 - <a href="https://apphourbooking.dwbooster.com/customdownloads/equal-to-rule.png" target="_blank">equal to rule</a></td></tr></tr><td style="margin-top:3px;">64 - <a href="https://apphourbooking.dwbooster.com/customdownloads/field-ids-tags-form-builder.png" target="_blank">field ids tags form builder</a></td></tr></tr><td style="margin-top:3px;">65 - <a href="https://apphourbooking.dwbooster.com/customdownloads/flow-payment-gateway-chile.png" target="_blank">flow payment gateway chile</a></td></tr></tr><td style="margin-top:3px;">66 - <a href="https://apphourbooking.dwbooster.com/customdownloads/generate-time-slots.png" target="_blank">generate time slots</a></td></tr></tr><td style="margin-top:3px;">67 - <a href="https://apphourbooking.dwbooster.com/customdownloads/google-cal-api-time-adjustment.png" target="_blank">google cal api time adjustment</a></td></tr></tr><td style="margin-top:3px;">68 - <a href="https://apphourbooking.dwbooster.com/customdownloads/google-calendar-test-user.png" target="_blank">google calendar test user</a></td></tr></tr><td style="margin-top:3px;">69 - <a href="https://apphourbooking.dwbooster.com/customdownloads/hide-service-field.png" target="_blank">hide service field</a></td></tr></tr><td style="margin-top:3px;">70 - <a href="https://apphourbooking.dwbooster.com/customdownloads/honeypot-feature.png" target="_blank">honeypot feature</a></td></tr></tr><td style="margin-top:3px;">71 - <a href="https://apphourbooking.dwbooster.com/customdownloads/ical-content.png" target="_blank">ical content</a></td></tr></tr><td style="margin-top:3px;">72 - <a href="https://apphourbooking.dwbooster.com/customdownloads/ical-time-difference.png" target="_blank">ical time difference</a></td></tr></tr><td style="margin-top:3px;">73 - <a href="https://apphourbooking.dwbooster.com/customdownloads/import-export-form-settings.png" target="_blank">import export form settings</a></td></tr></tr><td style="margin-top:3px;">74 - <a href="https://apphourbooking.dwbooster.com/customdownloads/installation-process.png" target="_blank">installation process</a></td></tr></tr><td style="margin-top:3px;">75 - <a href="https://apphourbooking.dwbooster.com/customdownloads/invalid-dates.png" target="_blank">invalid dates</a></td></tr></tr><td style="margin-top:3px;">76 - <a href="https://apphourbooking.dwbooster.com/customdownloads/license.png" target="_blank">license</a></td></tr></tr><td style="margin-top:3px;">77 - <a href="https://apphourbooking.dwbooster.com/customdownloads/load-speed-cache.png" target="_blank">load speed cache</a></td></tr></tr><td style="margin-top:3px;">78 - <a href="https://apphourbooking.dwbooster.com/customdownloads/max-appointments.png" target="_blank">max appointments</a></td></tr></tr><td style="margin-top:3px;">79 - <a href="https://apphourbooking.dwbooster.com/customdownloads/military-time.png" target="_blank">military time</a></td></tr></tr><td style="margin-top:3px;">80 - <a href="https://apphourbooking.dwbooster.com/customdownloads/min-date-max-date.png" target="_blank">min date max date</a></td></tr></tr><td style="margin-top:3px;">81 - <a href="https://apphourbooking.dwbooster.com/customdownloads/min-date-mixed.png" target="_blank">min date mixed</a></td></tr></tr><td style="margin-top:3px;">82 - <a href="https://apphourbooking.dwbooster.com/customdownloads/mycred_activating_and_settings.png" target="_blank">mycred activating and settings</a></td></tr></tr><td style="margin-top:3px;">83 - <a href="https://apphourbooking.dwbooster.com/customdownloads/mycred_enabling.png" target="_blank">mycred enabling</a></td></tr></tr><td style="margin-top:3px;">84 - <a href="https://apphourbooking.dwbooster.com/customdownloads/mycred_visual_settings.png" target="_blank">mycred visual settings</a></td></tr></tr><td style="margin-top:3px;">85 - <a href="https://apphourbooking.dwbooster.com/customdownloads/only-date-rule.png" target="_blank">only date rule</a></td></tr></tr><td style="margin-top:3px;">86 - <a href="https://apphourbooking.dwbooster.com/customdownloads/order-payment-options-add-on.png" target="_blank">order payment options add on</a></td></tr></tr><td style="margin-top:3px;">87 - <a href="https://apphourbooking.dwbooster.com/customdownloads/order-payment-options.png" target="_blank">order payment options</a></td></tr></tr><td style="margin-top:3px;">88 - <a href="https://apphourbooking.dwbooster.com/customdownloads/padding-time.png" target="_blank">padding time</a></td></tr></tr><td style="margin-top:3px;">89 - <a href="https://apphourbooking.dwbooster.com/customdownloads/paid-later-status.png" target="_blank">paid later status</a></td></tr></tr><td style="margin-top:3px;">90 - <a href="https://apphourbooking.dwbooster.com/customdownloads/pay-later-label.png" target="_blank">pay later label</a></td></tr></tr><td style="margin-top:3px;">91 - <a href="https://apphourbooking.dwbooster.com/customdownloads/payment-add-ons-settings.png" target="_blank">payment add ons settings</a></td></tr></tr><td style="margin-top:3px;">92 - <a href="https://apphourbooking.dwbooster.com/customdownloads/payment-product-name.png" target="_blank">payment product name</a></td></tr></tr><td style="margin-top:3px;">93 - <a href="https://apphourbooking.dwbooster.com/customdownloads/paypal-add-ons-settings.png" target="_blank">paypal add ons settings</a></td></tr></tr><td style="margin-top:3px;">94 - <a href="https://apphourbooking.dwbooster.com/customdownloads/pending-status-expiration.png" target="_blank">pending status expiration</a></td></tr></tr><td style="margin-top:3px;">95 - <a href="https://apphourbooking.dwbooster.com/customdownloads/plugin-version-number.png" target="_blank">plugin version number</a></td></tr></tr><td style="margin-top:3px;">96 - <a href="https://apphourbooking.dwbooster.com/customdownloads/query-monitor.png" target="_blank">query monitor</a></td></tr></tr><td style="margin-top:3px;">97 - <a href="https://apphourbooking.dwbooster.com/customdownloads/razorpay.png" target="_blank">razorpay</a></td></tr></tr><td style="margin-top:3px;">98 - <a href="https://apphourbooking.dwbooster.com/customdownloads/sales-force-add-on-settings.png" target="_blank">sales force add on settings</a></td></tr></tr><td style="margin-top:3px;">99 - <a href="https://apphourbooking.dwbooster.com/customdownloads/schedule-calendar-add-on-configuration.png" target="_blank">schedule calendar add on configuration</a></td></tr></tr><td style="margin-top:3px;">100 - <a href="https://apphourbooking.dwbooster.com/customdownloads/schedule-calendar-add-on-enabling.png" target="_blank">schedule calendar add on enabling</a></td></tr></tr><td style="margin-top:3px;">101 - <a href="https://apphourbooking.dwbooster.com/customdownloads/schedule-calendar-view.png" target="_blank">schedule calendar view</a></td></tr></tr><td style="margin-top:3px;">102 - <a href="https://apphourbooking.dwbooster.com/customdownloads/schedule-colors-per-calendar.png" target="_blank">schedule colors per calendar</a></td></tr></tr><td style="margin-top:3px;">103 - <a href="https://apphourbooking.dwbooster.com/customdownloads/schedule-list-view.png" target="_blank">schedule list view</a></td></tr></tr><td style="margin-top:3px;">104 - <a href="https://apphourbooking.dwbooster.com/customdownloads/shortcode-quote-characters.png" target="_blank">shortcode quote characters</a></td></tr></tr><td style="margin-top:3px;">105 - <a href="https://apphourbooking.dwbooster.com/customdownloads/show-total-cost.png" target="_blank">show total cost</a></td></tr></tr><td style="margin-top:3px;">106 - <a href="https://apphourbooking.dwbooster.com/customdownloads/single-days-selection-interface.png" target="_blank">single days selection interface</a></td></tr></tr><td style="margin-top:3px;">107 - <a href="https://apphourbooking.dwbooster.com/customdownloads/split-day-hours.png" target="_blank">split day hours</a></td></tr></tr><td style="margin-top:3px;">108 - <a href="https://apphourbooking.dwbooster.com/customdownloads/square-settings.png" target="_blank">square settings</a></td></tr></tr><td style="margin-top:3px;">109 - <a href="https://apphourbooking.dwbooster.com/customdownloads/stripe-add-on-settings.png" target="_blank">stripe add on settings</a></td></tr></tr><td style="margin-top:3px;">110 - <a href="https://apphourbooking.dwbooster.com/customdownloads/submit-label.png" target="_blank">submit label</a></td></tr></tr><td style="margin-top:3px;">111 - <a href="https://apphourbooking.dwbooster.com/customdownloads/summary-field-configuration.png" target="_blank">summary field configuration</a></td></tr></tr><td style="margin-top:3px;">112 - <a href="https://apphourbooking.dwbooster.com/customdownloads/summary-field.png" target="_blank">summary field</a></td></tr></tr><td style="margin-top:3px;">113 - <a href="https://apphourbooking.dwbooster.com/customdownloads/text-em-all-add-on.png" target="_blank">text em all add on</a></td></tr></tr><td style="margin-top:3px;">114 - <a href="https://apphourbooking.dwbooster.com/customdownloads/troubleshoot-area.png" target="_blank">troubleshoot area</a></td></tr></tr><td style="margin-top:3px;">115 - <a href="https://apphourbooking.dwbooster.com/customdownloads/twilio-sms.png" target="_blank">twilio sms</a></td></tr></tr><td style="margin-top:3px;">116 - <a href="https://apphourbooking.dwbooster.com/customdownloads/validation-texts.png" target="_blank">validation texts</a></td></tr></tr><td style="margin-top:3px;">117 - <a href="https://apphourbooking.dwbooster.com/customdownloads/whatsapp-button-addon.png" target="_blank">whatsapp button addon</a></td></tr></tr><td style="margin-top:3px;">118 - <a href="https://apphourbooking.dwbooster.com/customdownloads/widget.png" target="_blank">widget</a></td></tr></tr><td style="margin-top:3px;">119 - <a href="https://apphourbooking.dwbooster.com/customdownloads/woocommerce-billing-autofill.png" target="_blank">woocommerce billing autofill</a></td></tr></tr><td style="margin-top:3px;">120 - <a href="https://apphourbooking.dwbooster.com/customdownloads/working-dates.png" target="_blank">working dates</a></td></tr></tr><td style="margin-top:3px;">121 - <a href="https://apphourbooking.dwbooster.com/customdownloads/zoom-oauth-permissions-scopes.png" target="_blank">zoom oauth permissions scopes</a></td></tr></tr><td style="margin-top:3px;">122 - <a href="https://apphourbooking.dwbooster.com/customdownloads/zoom-oauth-setup-II.png" target="_blank">zoom oauth setup II</a></td></tr></tr><td style="margin-top:3px;">123 - <a href="https://apphourbooking.dwbooster.com/customdownloads/zoom-oauth-setup.png" target="_blank">zoom oauth setup</a></td></tr></table></div>



<!-- END:: help contents area -->

<br />
<input type="button" value="<?php _e('Commom Cases of Use','appointment-hour-booking'); ?>" onclick="window.open('https://apphourbooking.dwbooster.com/blog');" class="button button-primary ahb-first-button" />
<input type="button" value="<?php _e('Complete FAQ','appointment-hour-booking'); ?>" onclick="window.open('https://apphourbooking.dwbooster.com/faq');" class="button button-primary ahb-first-button" />
<input type="button" value="<?php _e('General Documentation','appointment-hour-booking'); ?>" onclick="window.open('https://apphourbooking.dwbooster.com/documentation');" class="button button-primary ahb-first-button" />
<input type="button" value="<?php _e('Contact Support Service','appointment-hour-booking'); ?>" onclick="window.open('https://wordpress.org/support/plugin/appointment-hour-booking#new-post');" class="button button-primary ahb-first-button" />
<hr />
<a href="https://wordpress.org/support/plugin/appointment-hour-booking#new-post"><?php _e('Further questions? Contact our support service.','appointment-hour-booking'); ?></a>