function checkAll(ele) {
  var checkboxes = document.getElementsByTagName('input');
  if (ele.checked) {
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type == 'checkbox') {
        checkboxes[i].checked = true;
      }
    }
  } else {
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type == 'checkbox') {
        checkboxes[i].checked = false;
      }
    }
  }
}


function getChecked(){
  var checked=[];
  $("input:checkbox").each(function(){
    var $this = $(this);

    if($this.is(":checked")){
      checked.push($this.attr("id"));
    }
  });
}
