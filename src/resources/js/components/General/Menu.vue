<template >
  <div id="nav">
    <div class="row">
      <a href="/">
        <img src="http://127.0.0.1:8080/images/logo.png" alt />
      </a>
      <ul>
        <li>
          <a href="/">Trang chủ</a>
        </li>
        <li>
          <a href="/category">Danh mục</a>
        </li>
        <li> 
          <a href="/login">Đăng nhập</a>
        </li>
        <li>
          <a href="/register">Đăng ký</a>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
    export default {
         data () {
            return {
                categories:[],
            }
        },
         
      
    }
</script>
<style lang="css" scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: OpenSans, sans-serif;
  font-weight: normal;
}

a {
  text-decoration: none;
}
li {
  list-style: none;
}
#nav {
  position: relative;
  height: 56px;
  background-color: white;
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
  padding: 8px 0;
}
#nav .row {
  display: flex;
  height: 40px;
  line-height: 40px;
  justify-content: space-between;
  width: 1110px;
  margin: 0 auto;
}
img {
  vertical-align: middle;
  border-style: none;
}
#nav ul li {
  display: inline-block;
  margin-left: 12px;
}
#nav li a {
  color: #a4aead;
  display: inline-block;
  font-family: OpenSans-SemiBold, sans-serif;
  font-size: 14px;
  height: 26px;
  line-height: 24px;
  text-transform: uppercase;
  padding: 0px 12px;
  border-radius: 3px;
}
#nav li:first-child a {
  color: #23b7a4;
  border: solid 2px #23b7a4;
}
#nav ul a:hover {
  border: solid 2px #5b6168;
  text-decoration: none;
  padding: 0px 10px;
}
#nav ul li:first-child a:hover {
  padding: 0px 12px;
  color: #ffffff;
  border: solid 2px #23b7a4;
  background: #23b7a4;
}
</style> 
