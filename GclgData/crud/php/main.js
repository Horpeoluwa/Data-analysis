$(".btnedit").click(e =>{
    let textvalues=displayData(e);
   let id = $("input[name*='book_ID']");
   let Fname = $("input[name*='fname']");
   let Age = $("input[name*='age']");
   let Sex = $("input[name*='sex']");
   let Branch = $("input[name*='branch']");
   let Dhostel = $("input[name*='dhostel']");
   let Homeaddress = $("input[name*='homeaddress']");
   let Phoneno = $("input[name*='phoneno']");
   let Nameofnextofkin = $("input[name*='nameofnextofkin']");
   let Phonenoofnextofkin = $("input[name*='phonenoofnextofkin']");

   id.val(textvalues[0]);
   Fname.val(textvalues[1]);
   Age.val(textvalues[2]);
   Sex.val(textvalues[3]);
   Branch.val(textvalues[4]);
   Dhostel.val(textvalues[5]);
   Homeaddress.val(textvalues[6]);
   Phoneno.val(textvalues[7]);
   Nameofnextofkin.val(textvalues[8]);
   Phonenoofnextofkin.val(textvalues[9]);
});


function displayData(e){
    let id =0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id==e.target.dataset.id){
            textvalues[id++]=value.textContent;
        }
    }
    return textvalues;
}


$(document).ready(function () {
    $('#myTable').DataTable({
        "pagingType" : "full_numbers",
        "lengthMenu":[
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search record",
        }
    });
});
