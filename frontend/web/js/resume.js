//resume education
//create
$(document).ready(function () {
    $('#button-add-education').on('click', function (event) {

        event.preventDefault();
        var data = $('#form-add-education').serialize();
        $.ajax({
            url: '/rabota/frontend/web/resume/resume-education/create',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                $('#button-add-education').prop('value', 'Save');
                $('.form-add-education').hide();                    
                $('.empty').hide();
            },
            complete: function () {
                $('#button-add-education').button('reset');
            },
            success: function (json) {
                        $("#w1").append(stringNewResumeEducation(json));
                    },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + xhr.statusText + +xhr.responseText);
            },
            timeout: 10000
        });
        $('#button-add-education-form').show();
    });
});

//update
$(document).ready(function () {
 $('#w1').delegate('.btn-primary', 'click', function() {
        //скрыть кнопку сохранить
        $('#button-add-education').hide(); 
        //скрыть кнопку показа формы 
        $('#button-add-education-form').hide();
        // показать кнопку отмены
        $('#btn btn-light').show(); 
        // показать кнопку сохранить изменения
        $('#button-update-education').show(); 
        // cняли блок с кнопок отмена
        $('.btn-danger').prop('disabled', false);
        //установили на конкретную кнопку удаления блок
        $("#button-delete-education"+ this.value).prop('disabled', true);
        var node = this;
        var data = 'id=' + encodeURIComponent(this.value);
         $.ajax({
            url: '/rabota/frontend/web/resume/resume-education/update',
            type: 'GET',
            data: data,
            dataType: 'json',
            beforeSend: function() {
		//$(node).hide();
                //$('#button-delete-education').hide();
		},
                
            complete: function() {
		$(node).button('reset');
		},
            success: function(json){
                $('.form-add-education').show();
                for(var key in json)    {
                    $('#resumeeducation-' + key + '').val(json[key]);
                }
                $('#select2-resumeeducation-city_id-container').text(json.city);
            },
            error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError  + xhr.statusText +  + xhr.responseText);
            },
            timeout: 10000
        });
    });
});

//update-save
$(document).ready(function () {
    $('#form-add-education').delegate('.btn-primary', 'click', function() {
        $("#button-delete-education"+ $('#resumeeducation-id').val()).prop('disabled', false);
        event.preventDefault();
        var data = $('#form-add-education').serialize();
         $.ajax({
            url: '/rabota/frontend/web/resume/resume-education/update?id=' + $('#resumeeducation-id').val(),
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
		//$(node).hide();
                //$('#button-delete-education').hide();
		},
                
            complete: function() {
		//$(node).button('reset');
		},
            success: function(json){
                        $('.item[data-key="'+ json.id +'"]').remove();
                        $('.form-add-education').hide();
                        $("#w1").append(stringNewResumeEducation(json));
                        //показать кнопку добавить
                        $('#button-add-education-form').show();
                    },
            error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError  + xhr.statusText +  + xhr.responseText);
            },
            timeout: 10000
        });
    });
});

//delete
$(document).ready(function () {
    $('#w1').delegate('.btn-danger', 'click', function () {
        var result = confirm('Are you sure you want to delete this item?');
        if (result) {
            var node = this;
            var data = 'id=' + encodeURIComponent(this.value);
            $.ajax({
                url: '/rabota/frontend/web/resume/resume-education/delete',
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function () {
                    //$(node).hide();
                    //$('#button-update-education').hide();
                },
                complete: function () {
                    $(node).button('reset');
                },
                success: function (json) {
                    $('.item[data-key="' + json + '"]').remove();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + xhr.statusText + +xhr.responseText);
                },
                timeout: 10000
            });
        }
    });
});

//show button-add-education
$(document).ready(function () {
        $('#button-add-education-form').click(function () {
        //показать форму
        $('.form-add-education').show();
        //показать кнопку добавить 
        $('#button-add-education').show();
        //спрачим кноку сохранить 
        $('#button-update-education').hide();
        //спрячим кнопку показа формы добовления образования
        $('#button-add-education-form').hide();
         // $("#name").focus();
    });
});

//hide button-add-education
$(document).ready(function () {
        $('.btn-light').click(function () {
        $('.btn-danger').prop('disabled', false);
        $('.form-add-education').hide();
        $('#button-add-education-form').show();
       // $("#name").focus();
    });
});





//resume experience
//create
$(document).ready(function () {
    $('#button-add-experience').on('click', function (event) {
        event.preventDefault();
        var data = $('#form-add-experience').serialize();
        $.ajax({
            url: '/rabota/frontend/web/resume/resume-experience/create',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                $('.button-add-experience').button('loading');
                $('.form-add-experience').hide();                    
                $('.empty').hide();
            },
            complete: function () {
                $('.button-add-experience').button('reset');
            },
            success: function (json) {
                $("#w2").append(stringNewResumeExperience(json));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + xhr.statusText + +xhr.responseText);
            },
            timeout: 100000
        });
        //вернем кнопку добовления формы записи
        $('#button-add-experience-form').show();
    });

});
 
 //delete
$(document).ready(function () {
    $('#w2').delegate('.btn-danger', 'click', function () {
        var result = confirm('Are you sure you want to delete this item?');
        if (result) {
            var node = this;
            var data = 'id=' + encodeURIComponent(this.value);
            $.ajax({
                url: '/rabota/frontend/web/resume/resume-experience/delete',
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function () {
                    //$(node).hide();
                    //$('#button-update-education').hide();
                },
                complete: function () {
                    $(node).button('reset');
                },
                success: function (json) {
                    $('.item[data-key="' + json + '"]').remove();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + xhr.statusText + +xhr.responseText);
                },
                timeout: 10000
            });
        }
    });
});
 
 //update
$(document).ready(function () {
 $('#w2').delegate('.btn-primary', 'click', function() {
        //скрыть кнопку сохранить
        $('#button-add-experience').hide(); 
        //скрыть кнопку показа формы 
        $('#button-add-experience-form').hide();
        // показать кнопку отмены
        $('#btn btn-light').show(); 
        // показать кнопку сохранить изменения
        $('#button-update-experience').show(); 
        // cняли блок с кнопок отмена
        $('.btn-danger').prop('disabled', false);
        //установили на конкретную кнопку удаления блок
        $("#button-delete-experience"+ this.value).prop('disabled', true);
        var node = this;
        var data = 'id=' + encodeURIComponent(this.value);
         $.ajax({
            url: '/rabota/frontend/web/resume/resume-experience/update',
            type: 'GET',
            data: data,
            dataType: 'json',
            beforeSend: function() {
		//$(node).hide();
                //$('#button-delete-education').hide();
		},
                
            complete: function() {
		$(node).button('reset');
		},
            success: function(json){
                $('.form-add-experience').show();
                for(var key in json)    {
                    $('#resumeexperience-' + key + '').val(json[key]);
                }
                $('#select2-resumeexperience-city_id-container').text(json.city);
                $('#select2-resumeexperience-profession_id-container').text(json.profession);
            },
            error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError  + xhr.statusText +  + xhr.responseText);
            },
            timeout: 10000
        });
    });
});

//update-save
$(document).ready(function () {
    $('#form-add-experience').delegate('.btn-primary', 'click', function () {
        $("#button-delete-experience" + $('#resumeexperience-id').val()).prop('disabled', false);
        event.preventDefault();
        var data = $('#form-add-experience').serialize();
        $.ajax({
            url: '/rabota/frontend/web/resume/resume-experience/update?id=' + $('#resumeexperience-id').val(),
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                //$(node).hide();
                //$('#button-delete-education').hide();
            },

            complete: function () {
                //$(node).button('reset');
            },
            success: function (json) {
                //удалить старую заись
                $('.item[data-key="' + json.id + '"]').remove();
                //спрятать форму
                $('.form-add-experience').hide();
                //добавить запись
                $("#w2").append(stringNewResumeExperience(json));
                //показать кнопку добавить
                $('#button-add-experience-form').show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + xhr.statusText + +xhr.responseText);
            },
            timeout: 10000
        });
    });
});

//show form add-experience
$(document).ready(function () {
        $('#button-add-experience-form').click(function () {
        //показать форму
        $('#form-add-experience').show();
        //показать кнопку добавить 
        $('#button-add-experience').show();
        //спрачим кноку сохранить 
        $('#button-update-experience').hide();
        //спрячим кнопку показа формы добовления образования
        $('#button-add-experience-form').hide();
         // $("#name").focus();
    });
});

//cancel button-add-education
$(document).ready(function () {
        $('.btn-light').click(function () {
        $('.btn-danger').prop('disabled', false);
        $('.form-add-experience').hide();
        $('#button-add-experience-form').show();
       // $("#name").focus();
    });
});
 ///////////common
 
function stringNewResumeEducation(json) {
    return '<div class="item" data-key="' + json.id + '"> '
            + '<article class="item" data-key="' + json.id + '"> <div class="row"> '
            + '<div class="col-lg-4"> Educational institution: ' + json.educational_institution
            + '<br> Faculty specialty: ' + json.faculty_specialty + '</div>'
            + '<div class="col-lg-4">  City: ' + json.city
            + '<br> Education details: ' + json.education_details + '</div>'
            + '<div class="col-lg-3">  Date from: ' + json.date_from
            + '<br> Date by: ' + json.date_by + '</div>'
            + '<div class="col-sm-1">'
            + '<button type="button" id="button-delete-education' + json.id + '" class="btn btn-danger" name="delete-education" value="' + json.id + '">delete</button>\n'
            + '<button type="button" id="button-update-education' + json.id + '" class="btn btn-primary" name="update-education" value="' + json.id + '">update</button></div>'
            + '</div></article><br><hr>'
            + '</div>';
}

function stringNewResumeExperience(json) {
    return  '<div class="item" data-key="' + json.id + '"> '
            + '<article class="item" data-key="' + json.id + '"> <div class="row"> '
            + '<div class="col-lg-4"> Company: ' + json.company
            + '<br> Activity company: ' + json.activity_company
            + '<br>  Profession: ' + json.profession + '</div>'
            + '<div class="col-lg-4">  City: ' + json.city
            + '<br> Education details: ' + json.education_details + '</div>'
            + '<div class="col-lg-3">  Date from: ' + json.date_from
            + '<br> Date by: ' + json.date_by + '</div>\n'
            + '<div class="col-sm-1">'
            + '<button type="button" id="button-delete-experience' + json.id + '" class="btn btn-danger" name="delete-experience" value="' + json.id + '">delete</button>\n'
            + '<button type="button" id="button-update-experience' + json.id + '" class="btn btn-primary" name="update-experience" value="' + json.id + '">update</button></div>'
            + '</div></article><br><hr>'
            + '</div>';
}
