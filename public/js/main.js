/******/ (() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!******************************!*\
      !*** ./resources/js/main.js ***!
      \******************************/
    $(document).ready(function () {

        $("#loadFromAresButton").on("click", function () {
            var partnercompanyId = $("#partnercompanyId").val();
            $.getJSON("../api/ares/" + partnercompanyId, function (data) {
                $("#partnercompanyVatId").val(data.payment_company_vatno);
                $("#invoiceTitle").val(data.payment_company);
            });
        });
        /* $( ".deleteRepeat" ).on( "click", function() {
           var repeatId = $( this ).data("id");
           //alert("smaz: "+repeatId);
           $.ajax({
                url : '../repeat-delete/'+repeatId,
                method : 'post',
           }).done(function( msg ) {
               alert( "Data Saved: " + msg );
             });
            alert("hotovo: "+repeatId);
         }); */

        $("#invoicePartnerLabel").on("click change", function () {
            var partnerId = $("#invoicePartnerLabel").val();
            $.getJSON("../api/partnerInfo/" + partnerId, function (data) {
                // alert(data.description);
                if (data.PartnerPriority === "immediately") {
                    data.typicDueTermInDays = 0;
                    data.PartnerPriority = 0;
                }

                $("#typicDueTermInDays").val(data.typicDueTermInDays);
                $("#RealDueTermInDays").val(data.PartnerPriority);
                $("#defaultCategoryId").val(data.defaultCategoryId);
                $('#invoiceCategory').val(data.defaultCategoryId); //invoiceCategory
            });
        });
        $("#issuedDateLabel").on("change", function () {
            //alert("splatnost: "+$( this ).val());
            var date = new Date($(this).val());
            var typicDueTermInDays = $("#typicDueTermInDays").val();
            typicDueTermInDays = parseInt(typicDueTermInDays); //alert("pricti: "+realnaSplatnostPlus);

            var datum = date.addDays(typicDueTermInDays);
            var datum = datum.toISOString().split('T')[0]; //alert(datum);

            $("#invoiceDueToLabel").val(datum);
            $("#invoiceDueToLabel").change();
        });
        $("#invoiceDueToLabel").on("change", function () {
            //alert("splatnost: "+$( this ).val());
            var date = new Date($(this).val());
            var realnaSplatnostPlus = $("#RealDueTermInDays").val();
            realnaSplatnostPlus = parseInt(realnaSplatnostPlus); //alert("pricti: "+realnaSplatnostPlus);

            var datum = date.addDays(realnaSplatnostPlus);
            var datum = datum.toISOString().split('T')[0]; //alert(datum);

            $("#invoiceRealDueToLabel").val(datum);
        });
        $("#invoiceRepeatLabel").on("change", function () {
            //alert("opakovani: "+$( this ).val());
            //var invoiceRepeatHiddenVal = $( "#invoiceRepeatHiddenVal" ).val();
            switch ($(this).val()) {
                case "none":
                    //alert('ahoj');
                    $("#repeatDetail").html("žádné opakování");
                    break;

                case "daily":
                    $("#repeatDetail").html("\n                <select name='repeatDays[]' style='display:none;'>\n                    <option>*\n                </select>\n                ");
                    break;

                case "monthly":
                    $("#repeatDetail").html("\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                ");
                    break;

                case "quartetly":
                    $("#repeatDetail").html("\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>\n                <br>\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>\n                <br>\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>\n                <br>\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>\n                ");
                    break;

                case "halfyear":
                    $("#repeatDetail").html("\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>\n                <br>\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>\n                ");
                    break;

                case "yearly":
                    $("#repeatDetail").html("\n                <select name='repeatDays[]'>\n                    <option>1\n                    <option>2\n                    <option>3\n                    <option>4\n                    <option>5\n                    <option>6\n                    <option>7\n                    <option>8\n                    <option>9\n                    <option>10\n                    <option>11\n                    <option>12\n                    <option>13\n                    <option>14\n                    <option>15\n                    <option>16\n                    <option>17\n                    <option>18\n                    <option>19\n                    <option>20\n                    <option>21\n                    <option>22\n                    <option>23\n                    <option>24\n                    <option>25\n                    <option>26\n                    <option>27\n                    <option>28\n                </select>\n                <select name='repeatMonth[]'>\n                    <option>Leden\n                    <option>\xDAnor\n                    <option>B\u0159ezen\n                    <option>Duben\n                    <option>Kv\u011Bten\n                    <option>\u010Cerven\n                    <option>\u010Cervenec\n                    <option>Srpen\n                    <option>Z\xE1\u0159\xED\n                    <option>\u0158\xEDjen\n                    <option>Listopad\n                    <option>Prosinec\n                </select>");
                    break;
            } //$( "#invoiceRealDueToLabel" ).val(datum);

        });
    });

    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };
    /******/ })()
;


function pripravParovani(idPlatby) {
    $('#idPlatby').val(idPlatby);
}

function loadActivityLogDetail(idLog, eventType) {
    $.getJSON( "/activity-log/detail/" + idLog, function( data ) {

        $("#TableLogWithOldAndNew").hide();
        $("#TableLogNew").hide();
        $("#TableLogSimple").hide();

        $("#logId").text(idLog);

        data = $.parseJSON(data); //convert to javascript array
        if (eventType == 'updated') {
            var rows = [];
            $.each( data.old, function( key, val ) {
                if (val == null || val == undefined) {
                    val = "";
                }
                if (data.attributes[`${key}`] == null || data.attributes[`${key}`] == undefined) {
                    data.attributes[`${key}`] = "";
                }
                row = `<tr><td>` + key + `</td><td>` + val +`</td><td>` + data.attributes[`${key}`] +`</td></tr>`;
                rows.push(row);
            });

            $("#logDetailTable").html(rows);
            $("#TableLogWithOldAndNew").show();

        }

        if (eventType == 'created') {
            var rows = [];
            $.each( data.attributes, function( key, val ) {
                if (val == null || val == undefined) {
                    val = "";
                }
                if (data.attributes[`${key}`] == null || data.attributes[`${key}`] == undefined) {
                    data.attributes[`${key}`] = "";
                }
                row = `<tr><td>` + key + `</td><td>` + val +`</td></tr>`;
                rows.push(row);
            });

            $("#logDetailTableCreated").html(rows);
            $("#TableLogNew").show();

        }

        if (eventType == 'login') {
            var rows = [];
            $.each( data, function( key, val ) {
                if (val == null || val == undefined) {
                    val = "";
                }
                row = `<tr><td>` + key + `</td><td>` + val +`</td></tr>`;
                rows.push(row);
            });

            $("#logDetailTableSimple").html(rows);
            $("#TableLogSimple").show();

        }

    });

    //$("#logDetailTable").show();

}
