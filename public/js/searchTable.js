function SearchTable(tableName,inputName,col) {
var availableTags =  [];
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById(inputName);
filter = input.value.toUpperCase();
table = document.getElementById(tableName);
tr = table.getElementsByTagName("tr")
// fill available tags from the table
for( var i = 1; i < table.rows.length ; i++)
{    
  availableTags.push(table.rows[i].cells[1].innerText);
} 
// fill the input with  the array of available tags
$( function() {
$("#" + inputName).autocomplete({
source: availableTags
});
});
// show the element searched  by col value
for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[col];
  if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }       
}
}
