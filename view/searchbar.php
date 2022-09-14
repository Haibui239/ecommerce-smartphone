<!-- <header class="container-fluid">
    <form action="?request=search" method="post">
        <section class="form-group col-md-4 row" style="margin:30px auto;">
            <input type="search" name="keyword" class="form-control col md-10">
             <input type="submit" value="Search" class="btn btn-info btn-sm">
</section>   
</header> -->
<style>
    * {
  outline: none;
}

.tb {
  display: table;
  width: 100%;
}

.td {
  display: table-cell;
  vertical-align: middle;
}

input,
button {
  color: #000;
  padding: 0;
  margin: 0;
  border: 0;
  background-color: transparent;
}

#cover {
  padding: 10px 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  transform: scale(0.5);
}

form {
  height: 96px;
}

input[type="text"] {
  width: 100%;
  font-size: 2rem;
  line-height: 1;
}

input[type="text"]::placeholder {
  color: #000;
}

#s-cover {
  width: 1px;
  padding-left: 35px;
}

button {
  position: relative;
  display: block;
  width: 84px;
  height: 96px;
  cursor: pointer;
}

#s-circle {
  position: relative;
  top: -8px;
  left: 0;
  width: 40px;
  height: 40px;
  margin-top: 0;
  border-width: 15px;
  border: 15px solid #000;
  background-color: transparent;
  border-radius: 50%;
  transition: 0.5s ease all;
}

button span {
  position: absolute;
  top: 57px;
  left: 17px;
  display: block;
  width: 45px;
  height: 15px;
  background-color: transparent;
  border-radius: 10px;
  transform: rotateZ(52deg);
  transition: 0.5s ease all;
}

button span:before,
button span:after {
  content: "";
  position: absolute;
  bottom: 0;
  right: 0;
  width: 45px;
  height: 15px;
  background-color: #000;
  border-radius: 10px;
  transform: rotateZ(0);
  transition: 0.5s ease all;
}

#s-cover:hover #s-circle {
  top: -1px;
  width: 67px;
  height: 15px;
  border-width: 0;
  background-color: #000;
  border-radius: 20px;
}

#s-cover:hover span {
  top: 50%;
  left: 56px;
  width: 25px;
  margin-top: -9px;
  transform: rotateZ(0);
}

#s-cover:hover button span:before {
  bottom: 11px;
  transform: rotateZ(52deg);
}

#s-cover:hover button span:after {
  bottom: -11px;
  transform: rotateZ(-52deg);
}
#s-cover:hover button span:before,
#s-cover:hover button span:after {
  right: -6px;
  width: 40px;
  background-color: #000;
}

</style>
<div id="cover">
  <form method="post" action="?request=search">
    <div class="tb">
      <div class="td"><input type="text" placeholder="Search" required name="keyword"></div>
      <div class="td" id="s-cover">
        <button type="submit">
          <div id="s-circle"></div>
          <span></span>
        </button>
      </div>
    </div>
  </form>
</div>