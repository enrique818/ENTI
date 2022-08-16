let valCommon = {
        validators: {
            notEmpty: {
                message: "{{__("input.invalid.empty")}}"
            },
            stringLength: {
                min: 4,
                max: 255,
                message: "{{__("input.invalid.length", ['min' => 4, 'max' => 255])}}"
            }
        }
    };
let valEmpty = {
        validators: {
            stringLength: {
                min: 4,
                max: 255,
                message: "{{__("input.invalid.length", ['min' => 4, 'max' => 255])}}"
            }
        }
    };
    let valEmail = {
        validators: {
            notEmpty: {
                message: "{{__("input.invalid.empty")}}"
            },
            emailAddress: {
                message: "{{__("input.invalid.email")}}"
            }
        }
    };
let valMax = {
        validators: {
            notEmpty: {
                message: "{{__("input.invalid.empty")}}"
            },
            stringLength: {
                max: 255,
                message: "{{__("input.invalid.lengthMax", ['max' => 255])}}"
            }
        }
    };

    let valDatetime = {
        validators: {
            notEmpty: {
                message: "{{__("input.invalid.empty")}}"
            },
            date: {
                format: "YYYY-MM-DD h:m:s",
                message: "Ingresa una fecha con hora valida",
            }
        }
    };

    let valDate = {
        validators: {
            notEmpty: {
                message: "{{__("input.invalid.empty")}}"
            },
            date: {
                format: "YYYY-MM-DD",
                message: "Ingresa una fecha valida",
            }
        }
    };

    let valDateEmpty = {
        validators: {
            date: {
                format: "YYYY-MM-DD",
                message: "Ingresa una fecha valida",
            }
        }
    };

    let valId = {
        validators: {
            notEmpty: {
                message: "{{__("input.invalid.empty")}}"
            },
            digits: {
                message: "{{__("input.invalid.digits")}}"
            }
        }
    };

    let valFile = {
        validators: {
                file: {
                    extension: 'png,jpg,jpeg',
                    message: "{{__('input.invalid.file', ['ext' => 'png, jpg, jpeg'])}}"
                }
            },
    };