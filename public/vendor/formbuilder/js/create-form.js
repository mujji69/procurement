jQuery(function() {
    // $('#visibility').change(function(e) {
    //     e.preventDefault()
    //     var ref = $(this)
    //
    //     if (ref.val() == "" || ref.val() == 'PUBLIC') {
    //         $('#allows_edit_DIV').hide()
    //     } else {
    //         $('#allows_edit_DIV').slideDown()
    //         $('#allows_edit').val('0')
    //     }
    // });

    // create the form editor
    var fbEditor = $(document.getElementById('fb-editor'))
    var formBuilder
    var fbOptions = {
        dataType: 'json',
        formData: window._form_builder_content ? window._form_builder_content : '',
        controlOrder: [
            'header',
            'paragraph',
            'text',
            'textarea',
            'select',
            'number',
            'date',
            'autocomplete',
            'file',
        ],
        defaultFields: [{
        className: "form-control",
        label: "Tender Name",
        placeholder: "",
        name: "name",
        required: true,
        type: "text"
      },
      {
      className: "form-control",
      label: "Tender Description",
      placeholder: "",
      name: "description",
      required: true,
      type: "textarea"
      },
      {
      className: "form-control",
      label: "Publishing Date",
      placeholder: "",
      name: "publishing_date",
      required: true,
      type: "date"
      },
      {
      className: "form-control",
      label: "Closing Date",
      placeholder: "",
      name: "closing_date",
      required: true,
      type: "date"
      },
       {
        className: "form-control",
        label: "Category",
        name: "category",
        type: "select",

        values: [{
          label: 'IT Equipment',
          value: 'IT Equipment'
        }, {
          label: 'Equipment for Agriculture / Livestock',
          value: 'Equipment for Agriculture / Livestock'
        },{
          label: 'Equipment for Health/Medical Supplies',
          value: 'Equipment for Health/Medical Supplies'
        },{
          label: 'Water Treatment/Equipment/Products',
          value: 'Water Treatment/Equipment/Products'
        },{
          label: 'Equipment for Meteorological',
          value: 'Equipment for Meteorological'
        },{
          label: 'Equipment for Technical & Vocational Training',
          value: 'Equipment for Technical & Vocational Training'
        },{
          label: 'Computer Hardware',
          value: 'Computer Hardware'
        },{
          label: 'Bullet Proof Vehicles/Parts/Accessories',
          value: 'Bullet Proof Vehicles/Parts/Accessories'
        },{
          label: 'Equipment for Security/Fire Fighting',
          value: 'Equipment for Security/Fire Fighting'
        },{
          label: 'Clearing Agents',
          value: 'Clearing Agents'
        },{
          label: 'Equipment for Construction',
          value: 'Equipment for Construction'
        },{
          label: 'Equipment for Energy',
          value: 'Equipment for Energy'
        },{
          label: 'Clearing Agents',
          value: 'Clearing Agents'
        },{
          label: 'Equipment for Geological',
          value: 'Equipment for Geological'
        },{
          label: 'Disaster Relief Goods (such as Tent, Pills, etc.)',
          value: 'Disaster Relief Goods (such as Tent, Pills, etc.)'
        },{
          label: 'Office Supply (such as Stationery, etc.)',
          value: 'Office Supply (such as Stationery, etc.)'
        },{
          label: 'Computer Software',
          value: 'Computer Software'
        },{
          label: 'Electronics',
          value: 'Electronics'
        },{
          label: 'General Vehicles/Parts/Accessories',
          value: 'General Vehicles/Parts/Accessories'
        },{
          label: 'Transport & Storage',
          value: 'Transport & Storage'
        },]
      },
    ],
        disableFields: [
            'button', // buttons are not needed since we are the one handling the submission
        ],  // field types that should not be shown
        disabledAttrs: [
            // 'access',
        ],
        typeUserDisabledAttrs: {
            'file': [
                'multiple',
                'subtype',
            ],
            'checkbox-group': [
                'other',
            ],
        },
        showActionButtons: false, // show the actions buttons at the bottom
        disabledActionButtons: ['data'], // get rid of the 'getData' button
        sortableControls: false, // allow users to re-order the controls to their liking
        editOnAdd: false,
        fieldRemoveWarn: false,
        roles: window.FormBuilder.form_roles || {},
        notify: {
            error: function(message) {
              return swal('Error', message, 'error')
            },
            success: function(message) {
              return swal('Success', message, 'success')
            },
            warning: function(message) {
              return swal('Warning', message, 'warning');
            }
        },
        onSave: function() {
            // var formData = formBuilder.formData
            // console.log(formData)
        },
    }

    formBuilder = fbEditor.formBuilder(fbOptions)

// defaults

// end defaults

    var fbClearBtn = $('.fb-clear-btn')
    var fbShowDataBtn = $('.fb-showdata-btn')
    var fbSaveBtn = $('.fb-save-btn')

    // setup the buttons to respond to save and clear
    fbClearBtn.click(function(e) {
        e.preventDefault()

        if (! formBuilder.actions.getData().length) return

        sConfirm("Are you sure you want to clear all fields from the form?", function() {
            formBuilder.actions.clearFields()
        })
    });

    fbShowDataBtn.click(function(e) {
        e.preventDefault()
        formBuilder.actions.showData()
    });

    fbSaveBtn.click(function(e) {
        e.preventDefault()

        var form = $('#createFormForm')

        // make sure the form is valid
        if ( ! form.parsley().validate() ) return

        // make sure the form builder is not empty
        if (! formBuilder.actions.getData().length) {
            swal({
                title: "Error",
                text: "The form builder cannot be empty",
                icon: 'error',
            })
            return
        }

        // ask for confirmation
        sConfirm("Save this form definition?", function() {
            fbSaveBtn.attr('disabled', 'disabled');
            fbClearBtn.attr('disabled', 'disabled');

            var formBuilderJSONData = formBuilder.actions.getData('json')
            // console.log(formBuilderJSONData)
            // var formBuilderArrayData = formBuilder.actions.getData()
            // console.log(formBuilderArrayData)

            var postData = {
                name: $('#name').val(),
                // visibility: $('#visibility').val(),
                // allows_edit: $('#allows_edit').val(),
                form_builder_json: formBuilderJSONData,
                _token: window.FormBuilder.csrfToken
            }

            var method = form.data('formMethod') ? 'PUT' : 'POST'
            jQuery.ajax({
                url: form.attr('action'),
                processData: true,
                data: postData,
                method: method,
                cache: false,
            })
            .then(function(response) {
                fbSaveBtn.removeAttr('disabled')
                fbClearBtn.removeAttr('disabled')

                if (response.success) {
                    // the form has been created
                    // send the user to the form index page
                    swal({
                        title: "Form Saved!",
                        text: response.details || '',
                        icon: 'success',
                    })

                    setTimeout(function() {
                        window.location = response.dest
                    }, 1500);

                    // clear out the form
                    // $('#name').val('')
                    // $('#visibility').val('')
                    // $('#allows_edit').val('0')
                } else {
                    swal({
                        title: "Error",
                        text: response.details || 'Error',
                        icon: 'error',
                    })
                }
            }, function(error) {
                handleAjaxError(error)

                fbSaveBtn.removeAttr('disabled')
                fbClearBtn.removeAttr('disabled')
            })
        })

    })

    // show the clear and save buttons
    $('#fb-editor-footer').slideDown()
})
