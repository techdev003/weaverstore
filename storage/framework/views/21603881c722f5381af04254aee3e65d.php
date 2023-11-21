<script src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript"></script>
    <script src="/admincss/js/jquery-3.3.1.min.js"></script>
    <script src="/admincss/js/popper.min.js"></script>
    <script src="/admincss/js/bootstrap.min.js"></script>
    <script src="/admincss/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/admincss/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="/admincss/js/plugins/chart.js"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>




<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-button').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the delete operation here
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(() => {
                        // Redirect or perform any other action after deletion
                        window.location.href = url;
                    });
                }
            });
        });
    });
</script>

<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(200).height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "",
                columns: [
                    { data: 'id', name: 'ID' },
                    { data: 'title', name: 'Title' },
                    { data: 'category', name: 'Category' },
                    { data: 'status', name: 'Status' },
                    { data: 'action', name: 'Action', orderable: false, searchable: false },
                ]
            });
        });
         });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $(function () {
            var table = $('.data-table1').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "",
                columns: [
                    { data: 'id', name: 'ID' },
                    { data: 'name', name: 'Name' },
                    { data: 'slug', name: 'Slug' },
                    { data: 'action', name: 'Action', orderable: false, searchable: false },
                ]
            });
        });
         });
</script>
 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(function () {
            var table = $('.data-table2').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "",
                columns: [
                    { data: 'id', name: 'ID' },
                    { data: 'comment', name: 'COMMENT' },
                    { data: 'action', name: 'Action', orderable: false, searchable: false },
                ]
            });
        });
         });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(function () {
            var table = $('.data-table3').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "", 
                columns: [
                    { data: 'id', name: 'ID' },
                    { data: 'Prod_Name', name: 'Preoduct Name' },
                    { data: 'Description', name: 'Price' },
                    { data: 'Price', name: 'Sale Price' },
                    { data: 'action', name: 'Action', orderable: false, searchable: false },
                ]
            });
        });
         });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(function () {
            var table = $('.data-table4').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "",
                columns: [
                    { data: 'id', name: 'ID' },
                    { data: 'address', name: 'Preoduct Name' },
                    { data: 'item', name: 'Price' },
                    { data: 'total', name: 'Sale Price' },
                    { data: 'status', name: 'Sale Price' },
                    { data: 'payment_status', name: 'Sale Price' },
                    { data: 'action', name: 'Action', orderable: false, searchable: false },
                ]
            });
        });
         });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(function () {
            var table = $('.data-table5').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "",
                columns: [
                    { data: 'id', name: 'ID' },
                    { data: 'name', name: ' Name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'Role' },
                    { data: 'status', name: 'Sale Price' },
                    { data: 'action', name: 'Action', orderable: false, searchable: false },
                ]
            });
        });
         });
</script>
<script>
$(document).ready(function() {
    $('#producttable').DataTable();
     $('#allorder').DataTable();
});
</script><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/admin/layouts/js.blade.php ENDPATH**/ ?>