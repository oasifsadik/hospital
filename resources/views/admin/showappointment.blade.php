
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <div align="center" style="padding-top: 100px;">
                <table>
                    <tr>
                        <th style="padding: 10px;">Patent Name</th>
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Doctor Name</th>
                        <th style="padding: 10px;">Date</th>
                        <th style="padding: 10px;">message</th>
                        <th style="padding: 10px;">status</th>
                        <th style="padding: 10px;">Approved</th>
                        <th style="padding: 10px;">Cancel</th>
                        <th style="padding: 10px;">Pescrib</th>
                        <th style="padding: 10px;">Sent Mail</th>
                    </tr>

                    @foreach ($data as $appoint )
                    <tr align="center">
                        <td>{{ $appoint->name }}</td>
                        <td>{{ $appoint->email }}</td>
                        <td>{{ $appoint->phone }}</td>
                        <td>{{ $appoint->doctor }}</td>
                        <td>{{ $appoint->date }}</td>
                        <td>{{ $appoint->message }}</td>
                        <td>{{ $appoint->status }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('approved',$appoint->id) }}">Approved</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('cancel',$appoint->id) }}">Cancel</a>
                        </td>
                        <td>
                            <a class="btn btn-dribbble" href="{{ url('pescrib',$appoint->id) }}">Pescrib</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('emailview',$appoint->id) }}">Mail</a>
                        </td>

                    </tr>
                    @endforeach

                </table>
            </div>

        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>