
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('assets/js/javascript-ajax.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
      // $(document).ready( function () {
      //     $('#example').DataTable();
      // } );

      // $('#myReportTable').DataTable( {
      //   drawCallback: function () {
      //     var api = this.api();
      //     $( api.table().footer() ).html(
      //       api.column(3).data().sum()
      //     );
      //   }
      // } );

      $(document).ready(function () {
        $('#example').DataTable({
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();
    
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
    
                // Total over all pages
                total = api
                    .column(7)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
    
                // Total over this page
                pageTotal = api
                    .column(7, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
    
                // Update footer
                $(api.column(7).footer()).html(pageTotal + ' ( ' + total + ' total)');
            },
        });
    });
    </script>
  
  </body>
</html>