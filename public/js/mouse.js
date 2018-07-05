var mst;
			jQuery(".xiala li").hover(function(){
			var curItem = jQuery(this);
			mst = setTimeout(function(){//��ʱ����
				curItem.find("div").slideDown('fast');
				mst = null;
			});
			}, function(){
			if(mst!=null)clearTimeout(mst);
			jQuery(this).find("div").slideUp('fast');
			});
	
	
	
	
	
	/*�ײ���꾭��*/
			var mst;
			jQuery(".Qr-codee li").hover(function(){
			var curItem = jQuery(this);
			mst = setTimeout(function(){//��ʱ����
				curItem.find("div").slideDown('fast');
				mst = null;
			});
			}, function(){
			if(mst!=null)clearTimeout(mst);
			jQuery(this).find("div").slideUp('fast');
			});
			


	/*�ײ���꾭��*/
			var mst;
			jQuery(".article-left-btn-group li").hover(function(){
			var curItem = jQuery(this);
			mst = setTimeout(function(){//��ʱ����
				curItem.find("div").slideDown('fast');
				mst = null;
			});
			}, function(){
			if(mst!=null)clearTimeout(mst);
			jQuery(this).find("div").slideUp('fast');
			});
			
			
	
	//ҳ���л�
	// JavaScript Document
function Tabs2(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
if (i == Num)
{
   thisObj.className = "active"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
}else{
   tabList[i].className = ""; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
}
} 
}


function Tabs1(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
if (i == Num)
{
   thisObj.className = "active"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
}else{
   tabList[i].className = ""; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
}
} 
}