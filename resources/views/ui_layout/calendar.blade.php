<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon " href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- icon จากเว็บ bootstrap --}}
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
        <div class="dropdown-menu d-block position-static p-2 mx-0 shadow rounded-3 w-340px" data-bs-theme="light">
          <div class="d-grid gap-1">
            <div class="cal">
              <div class="cal-month">
                <button class="btn cal-btn" type="button">
                  <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"/></svg>
                </button>
                <strong class="cal-month-name">June</strong>
                <select class="form-select cal-month-name d-none">
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option selected value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
                </select>
                <button class="btn cal-btn" type="button">
                  <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"/></svg>
                </button>
              </div>
              <div class="cal-weekdays text-body-secondary">
                <div class="cal-weekday">Sun</div>
                <div class="cal-weekday">Mon</div>
                <div class="cal-weekday">Tue</div>
                <div class="cal-weekday">Wed</div>
                <div class="cal-weekday">Thu</div>
                <div class="cal-weekday">Fri</div>
                <div class="cal-weekday">Sat</div>
              </div>
              <div class="cal-days">
                <button class="btn cal-btn" disabled type="button">30</button>
                <button class="btn cal-btn" disabled type="button">31</button>
      
                <button class="btn cal-btn" type="button">1</button>
                <button class="btn cal-btn" type="button">2</button>
                <button class="btn cal-btn" type="button">3</button>
                <button class="btn cal-btn" type="button">4</button>
                <button class="btn cal-btn" type="button">5</button>
                <button class="btn cal-btn" type="button">6</button>
                <button class="btn cal-btn" type="button">7</button>
      
                <button class="btn cal-btn" type="button">8</button>
                <button class="btn cal-btn" type="button">9</button>
                <button class="btn cal-btn" type="button">10</button>
                <button class="btn cal-btn" type="button">11</button>
                <button class="btn cal-btn" type="button">12</button>
                <button class="btn cal-btn" type="button">13</button>
                <button class="btn cal-btn" type="button">14</button>
      
                <button class="btn cal-btn" type="button">15</button>
                <button class="btn cal-btn" type="button">16</button>
                <button class="btn cal-btn" type="button">17</button>
                <button class="btn cal-btn" type="button">18</button>
                <button class="btn cal-btn" type="button">19</button>
                <button class="btn cal-btn" type="button">20</button>
                <button class="btn cal-btn" type="button">21</button>
      
                <button class="btn cal-btn" type="button">22</button>
                <button class="btn cal-btn" type="button">23</button>
                <button class="btn cal-btn" type="button">24</button>
                <button class="btn cal-btn" type="button">25</button>
                <button class="btn cal-btn" type="button">26</button>
                <button class="btn cal-btn" type="button">27</button>
                <button class="btn cal-btn" type="button">28</button>
      
                <button class="btn cal-btn" type="button">29</button>
                <button class="btn cal-btn" type="button">30</button>
                <button class="btn cal-btn" type="button">31</button>
              </div>
            </div>
          </div>
        </div>
      
        <div class="dropdown-menu d-block position-static p-2 mx-0 shadow rounded-3 w-340px" data-bs-theme="dark">
          <div class="d-grid gap-1">
            <div class="cal">
              <div class="cal-month">
                <button class="btn cal-btn" type="button">
                  <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"/></svg>
                </button>
                <strong class="cal-month-name">June</strong>
                <select class="form-select cal-month-name d-none">
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option selected value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
                </select>
                <button class="btn cal-btn" type="button">
                  <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"/></svg>
                </button>
              </div>
              <div class="cal-weekdays text-body-secondary">
                <div class="cal-weekday">Sun</div>
                <div class="cal-weekday">Mon</div>
                <div class="cal-weekday">Tue</div>
                <div class="cal-weekday">Wed</div>
                <div class="cal-weekday">Thu</div>
                <div class="cal-weekday">Fri</div>
                <div class="cal-weekday">Sat</div>
              </div>
              <div class="cal-days">
                <button class="btn cal-btn" disabled type="button">30</button>
                <button class="btn cal-btn" disabled type="button">31</button>
      
                <button class="btn cal-btn" type="button">1</button>
                <button class="btn cal-btn" type="button">2</button>
                <button class="btn cal-btn" type="button">3</button>
                <button class="btn cal-btn" type="button">4</button>
                <button class="btn cal-btn" type="button">5</button>
                <button class="btn cal-btn" type="button">6</button>
                <button class="btn cal-btn" type="button">7</button>
      
                <button class="btn cal-btn" type="button">8</button>
                <button class="btn cal-btn" type="button">9</button>
                <button class="btn cal-btn" type="button">10</button>
                <button class="btn cal-btn" type="button">11</button>
                <button class="btn cal-btn" type="button">12</button>
                <button class="btn cal-btn" type="button">13</button>
                <button class="btn cal-btn" type="button">14</button>
      
                <button class="btn cal-btn" type="button">15</button>
                <button class="btn cal-btn" type="button">16</button>
                <button class="btn cal-btn" type="button">17</button>
                <button class="btn cal-btn" type="button">18</button>
                <button class="btn cal-btn" type="button">19</button>
                <button class="btn cal-btn" type="button">20</button>
                <button class="btn cal-btn" type="button">21</button>
      
                <button class="btn cal-btn" type="button">22</button>
                <button class="btn cal-btn" type="button">23</button>
                <button class="btn cal-btn" type="button">24</button>
                <button class="btn cal-btn" type="button">25</button>
                <button class="btn cal-btn" type="button">26</button>
                <button class="btn cal-btn" type="button">27</button>
                <button class="btn cal-btn" type="button">28</button>
      
                <button class="btn cal-btn" type="button">29</button>
                <button class="btn cal-btn" type="button">30</button>
                <button class="btn cal-btn" type="button">31</button>
              </div>
            </div>
          </div>
        </div>
      </div> 

</body>

</html>