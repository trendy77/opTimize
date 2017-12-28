

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-84079763-15']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
var a = document.getElementsByTagName('a');
for(i = 0; i < a.length; i++){
if (a[i].href.indexOf(location.host) == -1 && a[i].href.match(/^http:///i)){
a[i].onclick = function(){
_gaq.push(['_trackEvent', 'outgoing_links', this.href.replace(/^http:///i, ")]);
}
}
}
</svar a = document.getElementsByTagName('a');		
for(i = 0; i < a.length; i++){
if (a[i].href.indexOf(location.host) == -1 && a[i].href.match(/^http:///i)){
a[i].onclick = function(){
_gaq.push(['_trackEvent', 'outgoing_links', this.href.replace(/^http:///i, ")]);
}
}
}



<a href="/auth/facebook">Login with Facebook</a>






</script>