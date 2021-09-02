var url = "<?=base_url();?>";

$("#success").hide();
$("#warning").hide();

var update_userinfo = function(user_id) {
    $.ajax({
        type: "POST",
        url: url,
        data: { user_id: user_id },
        success: function(result) {
            var res = JSON.parse(result);

        }
    });
}

var get_userinfo = function(user_id) {
    $.ajax({
        type: "POST",
        url: 'Home/get_userInfo',
        data: { user_id: user_id },
        success: function(result) {
            var res = JSON.parse(result);
            $('#edit_user_fullname').val(res.result[0].user_firstname);
            $("#edit_user_email").val(res.result[0].user_email);
            $("#edit_user_mobile").val(res.result[0].user_mobile);
            $("#edit_user_name").val(res.result[0].user_name);
            $("#edit_user_password").val(res.result[0].user_password);
            $("#edit_profile_name").val(res.result[0].user_profile_img);
            $("#edit_user_id").val(res.result[0].user_id);
        }
    });
}

var get_vehicalinfo = function(vehical_id, type) {
    if (vehical_id != "") {
        $.ajax({
            type: "POST",
            url: 'Home/get_vehicalInfo',
            data: { vehical_id: vehical_id },
            success: function(result) {
                var res = JSON.parse(result);
                if (type == "update") {
                    $('#edit_vehical_number').val(res.result[0].vehical_number);
                    $("#edit_vehical_create_dt").val(res.result[0].vehical_create_dt);
                    $("#edit_vehical_weight").val(res.result[0].vehical_weight);
                    $("#edit_vehical_entry_time").val(res.result[0].vehical_entry_time);
                    $("#edit_vehical_exist_time").val(res.result[0].vehical_exist_time);
                    $("#edit_supervisor_name").val(res.result[0].supervisor_name);
                    $("#edit_vehical_company_name").val(res.result[0].vehical_company_name);
                    $("#edit_vehical_id").val(res.result[0].vehical_id);
                    $("#edit_ticket_no").val(res.result[0].ticket_no);
                    $("#edit_item_name").val(res.result[0].item_name);
                    $("#edit_gross_weight").val(res.result[0].gross_weight);
                    $("#edit_tare_weight").val(res.result[0].tare_weight);
                    $("#edit_vehical_weight_measure").val(res.result[0].vehical_weight_measure);
                } else if (type == 'list') {
                    $("#company_name").val(res.result[0].vehical_company_name);
                }
            }
        });
    } else {
        if (type == 'list') {
            $("#company_name").val('');
        }
    }
}

var get_wasteScheduleinfo = function(schedule_id, type = '') {
    if (schedule_id != "") {
        $.ajax({
            type: "POST",
            url: 'Home/get_scheduleInfo',
            data: { schedule_id: schedule_id },
            success: function(result) {
                var res = JSON.parse(result);
                if (type == "update") {
                    $('#edit_create_date').val(res.result[0].create_date);
                    $("#edit_driver_name").val(res.result[0].driver_name);
                    $("#edit_vehical_number").val(res.result[0].vehical_number);
                    $("#edit_company_name").val(res.result[0].company_name);
                    $("#edit_location").val(res.result[0].location);
                    $("#edit_time_in").val(res.result[0].time_in);
                    $("#edit_time_out").val(res.result[0].time_out);
                    $("#edit_schedule_id").val(res.result[0].schedule_id);
                } else if (type == 'list') {
                    $("#company_name").val(res.result[0].vehical_company_name);
                }
            }
        });
    }
}

var get_wasteProcessinginfo = function(processing_id, type = '') {
    if (processing_id != "") {
        $.ajax({
            type: "POST",
            url: 'Home/get_processingInfo',
            data: { processing_id: processing_id },
            success: function(result) {
                var res = JSON.parse(result);
                if (type == "update") {
                    $('#edit_processing_create_dt').val(res.result[0].processing_create_dt);
                    $("#edit_total_wet_waste_collection").val(res.result[0].total_wet_waste_collection);
                    $("#edit_total_dry_waste_collection").val(res.result[0].total_dry_waste_collection);
                    $("#edit_total_garden_waste_collection").val(res.result[0].total_garden_waste_collection);
                    $("#edit_total_wet_waste_processing").val(res.result[0].total_wet_waste_processing);
                    $("#edit_total_dry_waste_processing").val(res.result[0].total_dry_waste_processing);
                    $("#edit_total_garden_waste_processing").val(res.result[0].total_garden_waste_processing);
                    $("#edit_non_processable_dry_waste_dispose").val(res.result[0].non_processable_dry_waste_dispose);
                    $("#edit_processing_id").val(res.result[0].processing_id);
                    $("#edit_measurement").val(res.result[0].measurement);
                }
            }
        });
    }
}

$(document).ready(function() {
    var form = $('#update_user_infos');
    var errorHandler1 = $('.errorHandler', form);
    var successHandler1 = $('.successHandler', form);
    form.validate({
        errorElement: "span",
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                error.insertAfter($(element).closest('.form-group').children('div'));
            } else {
                error.insertAfter(element);
            }
        },
        ignore: "",
        rules: {
            edit_user_fullname: {
                required: true
            },
            edit_user_email: {
                required: true,
                email: true
            },
            edit_user_mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12
            },
            edit_user_password: {
                required: true,
                minlength: 6
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
            successHandler1.hide();
            errorHandler1.show();
        },
        highlight: function(element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function(label, element) {
            label.addClass('help-block valid');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
        },
        submitHandler: function(form) {
            successHandler1.show();
            errorHandler1.hide();
            form.submit();
        }
    });
});

$(document).ready(function() {
    var form = $('#add_user_infos');
    var errorHandler1 = $('.errorHandler', form);
    var successHandler1 = $('.successHandler', form);
    form.validate({
        errorElement: "span",
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                error.insertAfter($(element).closest('.form-group').children('div'));
            } else {
                error.insertAfter(element);
            }
        },
        ignore: "",
        rules: {
            user_fullname: {
                required: true
            },
            user_email: {
                required: true,
                email: true
            },
            user_name: {
                required: true,
                minlength: 6
            },
            user_mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12
            },
            user_password: {
                required: true,
                minlength: 6
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
            successHandler1.hide();
            errorHandler1.show();
        },
        highlight: function(element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function(label, element) {
            label.addClass('help-block valid');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
        },
        submitHandler: function(form) {
            successHandler1.show();
            errorHandler1.hide();
            form.submit();
        }
    });
});

$(document).ready(function() {
    var form = $('#vehical_update');
    var errorHandler1 = $('.errorHandler', form);
    var successHandler1 = $('.successHandler', form);
    form.validate({
        errorElement: "span",
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                error.insertAfter($(element).closest('.form-group').children('div'));
            } else {
                error.insertAfter(element);
            }
        },
        ignore: "",
        rules: {
            edit_vehical_number: {
                required: true
            },
            edit_vehical_weight: {
                required: true,
                digits: true
            },
            edit_vehical_weight_measure: {
                required: true
            },
            edit_vehical_entry_time: {
                required: true
            },
            edit_vehical_exist_time: {
                required: true
            },
            edit_supervisor_name: {
                required: true
            },
            edit_vehical_company_name: {
                required: true
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
            successHandler1.hide();
            errorHandler1.show();
        },
        highlight: function(element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function(label, element) {
            label.addClass('help-block valid');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
        },
        submitHandler: function(form) {
            successHandler1.show();
            errorHandler1.hide();
            form.submit();
        }
    });
});

$(document).ready(function() {
    var form = $('#vehical_add');
    var errorHandler1 = $('.errorHandler', form);
    var successHandler1 = $('.successHandler', form);
    form.validate({
        errorElement: "span",
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                error.insertAfter($(element).closest('.form-group').children('div'));
            } else {
                error.insertAfter(element);
            }
        },
        ignore: "",
        rules: {
            vehicle_number: {
                required: true
            },
            vehical_weight: {
                required: true,
                digits: true
            },
            vehical_weight_measure: {
                required: true
            },
            vehical_entry_time: {
                required: true
            },
            vehical_exist_time: {
                required: true
            },
            supervisor_name: {
                required: true
            },
            vehical_company_name: {
                required: true
            },
            vehical_create_dt: {
                required: true
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
            successHandler1.hide();
            errorHandler1.show();
        },
        highlight: function(element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function(label, element) {
            label.addClass('help-block valid');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
        },
        submitHandler: function(form) {
            successHandler1.show();
            errorHandler1.hide();
            form.submit();
        }
    });
});