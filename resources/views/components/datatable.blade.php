<script>
// $(document).ready(function() {
    @if($multi)
    $('#{{$id}} #searchs th').each( function () {
        var title = $(this).text();
        $(this).html( '<div><input class="form-control form-control-sm p-1 w-100" type="text" placeholder="" /></div>' );
    } );
    @endif
    var {{$name}} = $("#{{$id}}").DataTable({
        processing: true,
        serverSide: true,
        order: [{{$order??""}}],
        ajax: {
            "url": "{{$dbroute}}",
            "data": function ( d ) {
                {{$data??""}}
            }
        },
        columns: {{$columns}},
        "drawCallback": function(oSettings, json) {
            {{$callback??''}}
            // alert( 'DataTables has finished its initialisation.' );
        },
        @if($multi)
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        @endif
        "language": {
            "lengthMenu": "{{__("datatables.lengthMenu")}}",
            "zeroRecords": "{{__("datatables.zeroRecords")}}",
            "info": "{{__("datatables.info")}}",
            "infoEmpty": "{{__("datatables.infoEmpty")}}",
            "infoFiltered": "{{__("datatables.infoFiltered")}}",
            "search": "{{__("datatables.search")}}",
            "processing": "{{__("datatables.processing")}}",
            "loadingRecords": "{{__("datatables.loadingRecords")}}",
            "emptyTable": "{{__("datatables.emptyTable")}}",
        },
        "dom":
          "<'row d-flex flex-wrap'" +
          @if(isset($buttons) && $buttons)
          "<'col-sm-12 d-flex align-items-center justify-conten-start'B>" +
          @endif
          "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
          "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
          ">" +

          "<'table-responsive'tr>" +

          "<'row'" +
          "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
          "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
          ">",
          @if(isset($buttons) && $buttons)
        "buttons": [
            'copy', 'excel', 'pdf',
        ]
        @endif
    });
// });
</script>