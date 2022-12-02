$(".btnedit").click(e =>{
    let textvalues=displayData(e);
   let id = $("input[name*='book_ID']");
   let Surname = $("input[name*='surname']");
   let Firstname = $("input[name*='firstname']");
   let Othername = $("input[name*='othername']");
   let Marital = $("input[name*='marital']");
   let Religion = $("input[name*='religion']");
   let Homeaddress = $("input[name*='homeaddress']");
   let Occupation = $("input[name*='occupation']");
   let Phoneno = $("input[name*='phoneno']");
   let Stateoforigin = $("input[name*='stateoforigin']");
   let Nameofnextofkin = $("input[name*='nameofnextofkin']");
   let Relationshiptonextofkin = $("input[name*='relationshiptonextofkin']");
   let addressofnextofkin = $("input[name*='addressofnextofkin']");
   let Phonenoofnextofkin = $("input[name*='phonenoofnextofkin']");
   let Stateoforiginofnextofkin = $("input[name*='stateoforiginofnextofkin']");
   let Age = $("input[name*='age']");
   let Sex = $("input[name*='sex']");
   let treatment = $("input[name*='treatment']");

   id.val(textvalues[0]);
   Surname.val(textvalues[1]);
   Firstname.val(textvalues[2]);
   Othername.val(textvalues[3]);
   Marital.val(textvalues[4]);
   Religion.val(textvalues[5]);
   Homeaddress.val(textvalues[6]);
   Occupation.val(textvalues[7]);
   Phoneno.val(textvalues[8]);
   Stateoforigin.val(textvalues[9]);
   Nameofnextofkin.val(textvalues[10]);
   Relationshiptonextofkin.val(textvalues[11]);
   addressofnextofkin.val(textvalues[11]);
   Phonenoofnextofkin.val(textvalues[12]);
   Stateoforiginofnextofkin.val(textvalues[13]);
   Age.val(textvalues[14]);
   Sex.val(textvalues[15]);
   treatment.val(textvalues[16])
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
