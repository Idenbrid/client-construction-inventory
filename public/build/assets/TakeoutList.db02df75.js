import{_ as b,a as d,o as i,c as o,b as e,F as c,r as u,d as h,v as f,f as p,w as _,t as a}from"./app.864d5ab7.js";const v={data(){return{list:[],warehouse:[],record:{warehouse_id:"",order_id:"",amount:""}}},created(){this.getUsedList(),this.getWarehouse()},methods:{saveRemaining(){d.post("/api/save-remaining",this.record).then(s=>{s.data.success==!1?s.data.message=="amount"?(Swal.close(),Swal.fire({icon:"info",title:"Amount should be less then ordered amount!"})):(Swal.close(),Swal.fire({icon:"error",title:"Something went wrong please reload the page and try again. Thanks"}),this.record={warehouse_id:"",order_id:"",amount:""}):(Swal.close(),Swal.fire({icon:"success",title:"Order has been updated successfully."}),this.record={warehouse_id:"",amount:""},this.getUsedList(),$("#reminder").modal("hide"))}).error(s=>{Swal.fire({icon:"error",title:"Something went wrong please reload the page and try again. Thanks"})})},allUsed(s){d.get("/api/all-used/"+s).then(l=>{l.data.success==!1?(Swal.close(),Swal.fire({icon:"error",title:"Something went wrong please reload the page and try again. Thanks"})):(Swal.close(),Swal.fire({icon:"success",title:"Order has been updated successfully."}),this.getUsedList())}).error(l=>{Swal.fire({icon:"error",title:"Something went wrong please reload the page and try again. Thanks"})})},getWarehouse(){d.get("/api/warehouse").then(s=>{this.warehouse=s.data})},getUsedList(){d.get("/api/get-orders-used-using").then(s=>{this.list=s.data,this.list.length>0&&$(document).ready(function(){$("#waiting_list_table").DataTable({columnDefs:[{width:"90px",targets:[0,1,2,3,4,5,6,7,8]}],searching:!1,info:!1,autoWidth:!1,lengthChange:!1})})})}}},w={class:"container-fluid p-0"},y={class:"main-content main-content-bg"},k=e("h1",{class:"content-h1"},"4. \u6301\u3061\u51FA\u3057\u4E2D\u4E00\u89A7",-1),S={class:"table-card table-responsive-sm"},x={id:"waiting_list_table",class:"table custom-table-list"},U=e("thead",null,[e("tr",null,[e("th",null,"\u767A\u6CE8\u5E74\u6708\u65E5"),e("th",null,"\u767A\u6CE8\u8005"),e("th",null,"\u5206\u985E"),e("th",null,"\u30E1\u30FC\u30AB\u30FC"),e("th",null,"\u54C1\u540D"),e("th",null,"\u578B\u756A"),e("th",null,"\u6570\u91CF"),e("th",null,"\u30B8\u30E7\u30D6\u756A\u53F7"),e("th",null,"\u73FE\u5834\u540D"),e("th")])],-1),C={class:"d-flex",style:{width:"max-content"}},L={key:0,class:"btn-rev-del"},T=["onClick"],j=["onClick"],D=e("a",{type:"button",class:"copy-content-btn disabled",value:"\u767B\u9332"},"\u53D6\u6D88",-1),B={key:1,class:"btn-rev-del"},M=e("a",{class:"delivery-btn"},"\u6301\u3061\u51FA\u3057\u5B8C\u4E86",-1),V=[M],W={class:"modal fade",id:"reminder","data-backdrop":"static","data-keyboard":"false",tabindex:"-1","aria-labelledby":"reminderLabel","aria-hidden":"true"},F={class:"modal-dialog modal-dialog-centered"},O={class:"modal-content"},R=e("div",{class:"modal-header border-0"},[e("button",{type:"button",class:"close","data-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"\xD7")])],-1),A={class:"modal-body"},E={class:"form-fields justify-content-center"},N=e("div",{class:"register-label align-items-center",bis_skin_checked:"1"},"\u7F6E\u304D\u5834\u767B\u9332",-1),q=["value"],z={class:"form-fields justify-content-center mt-3"},G=e("div",{class:"register-label align-items-center",bis_skin_checked:"1"},"\u6570\u91CF",-1),H={class:"modal-footer border-0 justify-content-center"};function I(s,l,J,K,n,r){return i(),o("div",w,[e("div",y,[k,e("div",S,[e("table",x,[U,e("tbody",null,[(i(!0),o(c,null,u(n.list,(t,m)=>(i(),o("tr",{key:m},[e("td",null,a(t.order_date),1),e("td",null,a(t.orderer.user_name),1),e("td",null,a(t.item.category),1),e("td",null,a(t.item.manufacturer),1),e("td",null,a(t.item.item_name),1),e("td",null,a(t.item.item_number),1),e("td",null,a(t.amount),1),e("td",null,a(t.job.job_number),1),e("td",null,a(t.job.site_name),1),e("td",C,[t.status!="used"?(i(),o("div",L,[e("a",{type:"button",onClick:g=>r.allUsed(t.id),class:"delivery-btn",value:"\u767B\u9332"},"\u4F7F\u3044\u7D42\u308A",8,T),e("a",{type:"button",onClick:_(g=>n.record.order_id=t.id,["prevent"]),class:"revision-btn",value:"\u767B\u9332","data-toggle":"modal","data-target":"#reminder"},"\u4F59\u308A",8,j),D])):(i(),o("div",B,V))])]))),128))])])]),e("div",W,[e("div",F,[e("div",O,[R,e("div",A,[e("div",E,[N,h(e("select",{class:"input-border","onUpdate:modelValue":l[0]||(l[0]=t=>n.record.warehouse_id=t),name:"cars",id:"cars"},[(i(!0),o(c,null,u(n.warehouse,t=>(i(),o("option",{value:t.id},a(t.warehouse_name),9,q))),256))],512),[[f,n.record.warehouse_id]])]),e("div",z,[G,h(e("input",{type:"text",class:"form-control","onUpdate:modelValue":l[1]||(l[1]=t=>n.record.amount=t),placeholder:"\u30C6\u30AD\u30B9\u30C8"},null,512),[[p,n.record.amount]])])]),e("div",H,[e("button",{type:"button",onClick:l[2]||(l[2]=_(t=>r.saveRemaining(),["prevent"])),class:"complete-btn"},"\u7D0D\u54C1\u6E08\u307F")])])])])])])}const Q=b(v,[["render",I]]);export{Q as default};