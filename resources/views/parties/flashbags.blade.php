
@if (session()->has('success'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}} 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
    </div>
</x-alert>
@endif
@if (session()->has('successupdate'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('successupdate')}} 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
    </div>
</x-alert>
@endif


@if (session()->has('success_login'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success_login')}} 
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
        </svg>
    </div>
</x-alert>
@endif

@if (session()->has('success_logout'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success_logout')}} 
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
        </svg>
    </div>
</x-alert>
@endif


@if (session()->has('success_delete'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success_delete')}} 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
          </svg>
    </div>
</x-alert>
@endif

@if (session()->has('error'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('error')}} 
    </div>
</x-alert>
@endif


@if (session()->has('errorrepair'))
<x-alert type="succes">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('errorrepair')}} 
        <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
</x-alert>
@endif

@if (session()->has('error_page'))
<style>
    /* Design Inspired by one of Stefan Devai's Design on Dribble */

.main_wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 200px;
  height: 200px;
}

.main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 5em;
  /* margin-left: 950px */
}

.antenna {
  width: 5em;
  height: 5em;
  border-radius: 50%;
  border: 2px solid black;
  background-color: #f27405;
  margin-bottom: -6em;
  margin-left: 0em;
  z-index: -1;
}
.antenna_shadow {
  position: absolute;
  background-color: transparent;
  width: 50px;
  height: 56px;
  margin-left: 1.68em;
  border-radius: 45%;
  transform: rotate(140deg);
  border: 4px solid transparent;
  box-shadow: inset 0px 16px #a85103, inset 0px 16px 1px 1px #a85103;
  -moz-box-shadow: inset 0px 16px #a85103, inset 0px 16px 1px 1px #a85103;
}
.antenna::after {
  content: "";
  position: absolute;
  margin-top: -9.4em;
  margin-left: 0.4em;
  transform: rotate(-25deg);
  width: 1em;
  height: 0.5em;
  border-radius: 50%;
  background-color: #f69e50;
}
.antenna::before {
  content: "";
  position: absolute;
  margin-top: 0.2em;
  margin-left: 1.25em;
  transform: rotate(-20deg);
  width: 1.5em;
  height: 0.8em;
  border-radius: 50%;
  background-color: #f69e50;
}
.a1 {
  position: relative;
  top: -102%;
  left: -130%;
  width: 12em;
  height: 5.5em;
  border-radius: 50px;
  background-image: linear-gradient(
    #171717,
    #171717,
    #353535,
    #353535,
    #171717
  );
  transform: rotate(-29deg);
  clip-path: polygon(50% 0%, 49% 100%, 52% 100%);
}
.a1d {
  position: relative;
  top: -211%;
  left: -35%;
  transform: rotate(45deg);
  width: 0.5em;
  height: 0.5em;
  border-radius: 50%;
  border: 2px solid black;
  background-color: #979797;
  z-index: 99;
}
.a2 {
  position: relative;
  top: -210%;
  left: -10%;
  width: 12em;
  height: 4em;
  border-radius: 50px;
  background-color: #171717;
  background-image: linear-gradient(
    #171717,
    #171717,
    #353535,
    #353535,
    #171717
  );
  margin-right: 5em;
  clip-path: polygon(
    47% 0,
    47% 0,
    34% 34%,
    54% 25%,
    32% 100%,
    29% 96%,
    49% 32%,
    30% 38%
  );
  transform: rotate(-8deg);
}
.a2d {
  position: relative;
  top: -294%;
  left: 94%;
  width: 0.5em;
  height: 0.5em;
  border-radius: 50%;
  border: 2px solid black;
  background-color: #979797;
  z-index: 99;
}

.notfound_text {
  background-color: black;
  padding-left: 0.3em;
  padding-right: 0.3em;
  font-size: 0.75em;
  color: white;
  letter-spacing: 0;
  border-radius: 5px;
  z-index: 10;
}
.tv {
  width: 17em;
  height: 9em;
  margin-top: 3em;
  border-radius: 15px;
  background-color: #d36604;
  display: flex;
  justify-content: center;
  border: 2px solid #1d0e01;
  box-shadow: inset 0.2em 0.2em #e69635;
}
.tv::after {
  content: "";
  position: absolute;
  width: 17em;
  height: 9em;
  border-radius: 15px;
  background: repeating-radial-gradient(#d36604 0 0.0001%, #00000070 0 0.0002%)
      50% 0/2500px 2500px,
    repeating-conic-gradient(#d36604 0 0.0001%, #00000070 0 0.0002%) 60% 60%/2500px
      2500px;
  background-blend-mode: difference;
  opacity: 0.09;
}
.curve_svg {
  position: absolute;
  margin-top: 0.25em;
  margin-left: -0.25em;
  height: 12px;
  width: 12px;
}
.display_div {
  display: flex;
  align-items: center;
  align-self: center;
  justify-content: center;
  border-radius: 15px;
  box-shadow: 3.5px 3.5px 0px #e69635;
}
.screen_out {
  width: auto;
  height: auto;

  border-radius: 10px;
}
.screen_out1 {
  width: 11em;
  height: 7.75em;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
}
.screen {
  width: 13em;
  height: 7.85em;
  font-family: Montserrat;
  border: 2px solid #1d0e01;
  background: repeating-radial-gradient(#000 0 0.0001%, #ffffff 0 0.0002%) 50% 0/2500px
      2500px,
    repeating-conic-gradient(#000 0 0.0001%, #ffffff 0 0.0002%) 60% 60%/2500px
      2500px;
  background-blend-mode: difference;
  animation: b 0.2s infinite alternate;
  border-radius: 10px;
  z-index: 99;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: #252525;
  letter-spacing: 0.15em;
  text-align: center;
}
@keyframes b {
  100% {
    background-position: 50% 0, 60% 50%;
  }
}

/* Another Error Screen to Use 

.screen {
  width: 13em;
  height: 7.85em;
  position: relative;
  background: linear-gradient(to right, #002fc6 0%, #002bb2 14.2857142857%, #3a3a3a 14.2857142857%, #303030 28.5714285714%, #ff0afe 28.5714285714%, #f500f4 42.8571428571%, #6c6c6c 42.8571428571%, #626262 57.1428571429%, #0affd9 57.1428571429%, #00f5ce 71.4285714286%, #3a3a3a 71.4285714286%, #303030 85.7142857143%, white 85.7142857143%, #fafafa 100%);
  border-radius: 10px;
  border: 2px solid black;
  z-index: 99;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: #252525;
  letter-spacing: 0.15em;
  text-align: center;
  overflow: hidden;
}
.screen:before, .screen:after {
  content: "";
  position: absolute;
  left: 0;
  z-index: 1;
  width: 100%;
}
.screen:before {
  top: 0;
  height: 68.4782608696%;
  background: linear-gradient(to right, white 0%, #fafafa 14.2857142857%, #ffe60a 14.2857142857%, #f5dc00 28.5714285714%, #0affd9 28.5714285714%, #00f5ce 42.8571428571%, #10ea00 42.8571428571%, #0ed600 57.1428571429%, #ff0afe 57.1428571429%, #f500f4 71.4285714286%, #ed0014 71.4285714286%, #d90012 85.7142857143%, #002fc6 85.7142857143%, #002bb2 100%);
}
.screen:after {
  bottom: 0;
  height: 21.7391304348%;
  background: linear-gradient(to right, #006c6b 0%, #005857 16.6666666667%, white 16.6666666667%, #fafafa 33.3333333333%, #001b75 33.3333333333%, #001761 50%, #6c6c6c 50%, #626262 66.6666666667%, #929292 66.6666666667%, #888888 83.3333333333%, #3a3a3a 83.3333333333%, #303030 100%);
}

  */

.lines {
  display: flex;
  column-gap: 0.1em;
  align-self: flex-end;
}
.line1,
.line3 {
  width: 2px;
  height: 0.5em;
  background-color: black;
  border-radius: 25px 25px 0px 0px;
  margin-top: 0.5em;
}
.line2 {
  flex-grow: 1;
  width: 2px;
  height: 1em;
  background-color: black;
  border-radius: 25px 25px 0px 0px;
}

.buttons_div {
  width: 4.25em;
  align-self: center;
  height: 8em;
  background-color: #e69635;
  border: 2px solid #1d0e01;
  padding: 0.6em;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  row-gap: 0.75em;
  box-shadow: 3px 3px 0px #e69635;
}
.b1 {
  width: 1.65em;
  height: 1.65em;
  border-radius: 50%;
  background-color: #7f5934;
  border: 2px solid black;
  box-shadow: inset 2px 2px 1px #b49577, -2px 0px #513721,
    -2px 0px 0px 1px black;
}
.b1::before {
  content: "";
  position: absolute;
  margin-top: 1em;
  margin-left: 0.5em;
  transform: rotate(47deg);
  border-radius: 5px;
  width: 0.1em;
  height: 0.4em;
  background-color: #000000;
}
.b1::after {
  content: "";
  position: absolute;
  margin-top: 0.9em;
  margin-left: 0.8em;
  transform: rotate(47deg);
  border-radius: 5px;
  width: 0.1em;
  height: 0.55em;
  background-color: #000000;
}
.b1 div {
  content: "";
  position: absolute;
  margin-top: -0.1em;
  margin-left: 0.65em;
  transform: rotate(45deg);
  width: 0.15em;
  height: 1.5em;
  background-color: #000000;
}
.b2 {
  width: 1.65em;
  height: 1.65em;
  border-radius: 50%;
  background-color: #7f5934;
  border: 2px solid black;
  box-shadow: inset 2px 2px 1px #b49577, -2px 0px #513721,
    -2px 0px 0px 1px black;
}
.b2::before {
  content: "";
  position: absolute;
  margin-top: 1.05em;
  margin-left: 0.8em;
  transform: rotate(-45deg);
  border-radius: 5px;
  width: 0.15em;
  height: 0.4em;
  background-color: #000000;
}
.b2::after {
  content: "";
  position: absolute;
  margin-top: -0.1em;
  margin-left: 0.65em;
  transform: rotate(-45deg);
  width: 0.15em;
  height: 1.5em;
  background-color: #000000;
}
.speakers {
  display: flex;
  flex-direction: column;
  row-gap: 0.5em;
}
.speakers .g1 {
  display: flex;
  column-gap: 0.25em;
}
.speakers .g1 .g11,
.g12,
.g13 {
  width: 0.65em;
  height: 0.65em;
  border-radius: 50%;
  background-color: #7f5934;
  border: 2px solid black;
  box-shadow: inset 1.25px 1.25px 1px #b49577;
}
.speakers .g {
  width: auto;
  height: 2px;
  background-color: #171717;
}

.bottom {
  width: 100%;
  height: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  column-gap: 8.7em;
}
.base1 {
  height: 1em;
  width: 2em;
  border: 2px solid #171717;
  background-color: #4d4d4d;
  margin-top: -0.15em;
  z-index: -1;
}
.base2 {
  height: 1em;
  width: 2em;
  border: 2px solid #171717;
  background-color: #4d4d4d;
  margin-top: -0.15em;
  z-index: -1;
}
.base3 {
  position: absolute;
  height: 0.15em;
  width: 17.5em;
  background-color: #171717;
  margin-top: 0.8em;
}

.text_404 {
  position: absolute;
  display: flex;
  flex-direction: row;
  column-gap: 6em;
  z-index: -5;
  margin-bottom: 2em;
  align-items: center;
  justify-content: center;
  opacity: 0.5;
  font-family: Montserrat;
}
.text_4041 {
  transform: scaleY(24.5) scaleX(9);
}
.text_4042 {
  transform: scaleY(24.5) scaleX(9);
}
.text_4043 {
  transform: scaleY(24.5) scaleX(9);
}

</style>
<x-alert type="succes">
    <div class="" role="alert">
        {{session('error_page')}} 
        <div class="main_wrapper">
            <div class="main">
              <div class="antenna">
                <div class="antenna_shadow"></div>
                <div class="a1"></div>
                <div class="a1d"></div>
                <div class="a2"></div>
                <div class="a2d"></div>
                <div class="a_base"></div>
              </div>
              <div class="tv">
                <div class="cruve">
                  <svg
                    xml:space="preserve"
                    viewBox="0 0 189.929 189.929"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns="http://www.w3.org/2000/svg"
                    version="1.1"
                    class="curve_svg"
                  >
                    <path
                      d="M70.343,70.343c-30.554,30.553-44.806,72.7-39.102,115.635l-29.738,3.951C-5.442,137.659,11.917,86.34,49.129,49.13
                  C86.34,11.918,137.664-5.445,189.928,1.502l-3.95,29.738C143.041,25.54,100.895,39.789,70.343,70.343z"
                    ></path>
                  </svg>
                </div>
                <div class="display_div">
                  <div class="screen_out">
                    <div class="screen_out1">
                      <div class="screen">
                        <span class="notfound_text">@lang('access_denied')</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="lines">
                  <div class="line1"></div>
                  <div class="line2"></div>
                  <div class="line3"></div>
                </div>
                <div class="buttons_div">
                  <div class="b1"><div></div></div>
                  <div class="b2"></div>
                  <div class="speakers">
                    <div class="g1">
                      <div class="g11"></div>
                      <div class="g12"></div>
                      <div class="g13"></div>
                    </div>
                    <div class="g"></div>
                    <div class="g"></div>
                  </div>
                </div>
              </div>
              <div class="bottom">
                <div class="base1"></div>
                <div class="base2"></div>
                <div class="base3"></div>
              </div>
            </div>
          </div>
          
    </div>
</x-alert>
@endif