/*! This file is auto-generated */
!function(n,w,t,v){"use strict";var l={},o={};w.mce=w.mce||{},w.mce.views={register:function(e,t){l[e]=w.mce.View.extend(_.extend(t,{type:e}))},unregister:function(e){delete l[e]},get:function(e){return l[e]},unbind:function(){_.each(o,function(e){e.unbind()})},setMarkers:function(e,a){var r,t,d=[{content:e}],c=this;return _.each(l,function(s,o){t=d.slice(),d=[],_.each(t,function(e){var t,n,i=e.content;if(e.processed)d.push(e);else{for(;i&&(t=s.prototype.match(i));)t.index&&d.push({content:i.substring(0,t.index)}),t.options.editor=a,n=(r=c.createInstance(o,t.content,t.options)).loader?".":r.text,d.push({content:r.ignore?n:'<p data-wpview-marker="'+r.encodedText+'">'+n+"</p>",processed:!0}),i=i.slice(t.index+t.content.length);i&&d.push({content:i})}})}),(e=_.pluck(d,"content").join("")).replace(/<p>\s*<p data-wpview-marker=/g,"<p data-wpview-marker=").replace(/<\/p>\s*<\/p>/g,"</p>")},createInstance:function(e,t,n,i){var s,e=this.get(e);return-1!==t.indexOf("[")&&-1!==t.indexOf("]")&&(t=t.replace(/\[[^\]]+\]/g,function(e){return e.replace(/[\r\n]/g,"")})),!i&&(s=this.getInstance(t))?s:(s=encodeURIComponent(t),n=_.extend(n||{},{text:t,encodedText:s}),o[s]=new e(n))},getInstance:function(e){return"string"==typeof e?o[encodeURIComponent(e)]:o[v(e).attr("data-wpview-text")]},getText:function(e){return decodeURIComponent(v(e).attr("data-wpview-text")||"")},render:function(t){_.each(o,function(e){e.render(null,t)})},update:function(e,t,n,i){var s=this.getInstance(n);s&&s.update(e,t,n,i)},edit:function(n,i){var s=this.getInstance(i);s&&s.edit&&s.edit(s.text,function(e,t){s.update(e,n,i,t)})},remove:function(e,t){var n=this.getInstance(t);n&&n.remove(e,t)}},w.mce.View=function(e){_.extend(this,e),this.initialize()},w.mce.View.extend=Backbone.View.extend,_.extend(w.mce.View.prototype,{content:null,loader:!0,initialize:function(){},getContent:function(){return this.content},render:function(e,t){null!=e&&(this.content=e),e=this.getContent(),(this.loader||e)&&(t&&this.unbind(),this.replaceMarkers(),e?this.setContent(e,function(e,t){v(t).data("rendered",!0),this.bindNode.call(this,e,t)},!!t&&null):this.setLoader())},bindNode:function(){},unbindNode:function(){},unbind:function(){this.getNodes(function(e,t){this.unbindNode.call(this,e,t)},!0)},getEditors:function(t){_.each(tinymce.editors,function(e){e.plugins.wpview&&t.call(this,e)},this)},getNodes:function(n,i){this.getEditors(function(e){var t=this;v(e.getBody()).find('[data-wpview-text="'+t.encodedText+'"]').filter(function(){var e;return null==i||(e=!0===v(this).data("rendered"),i?e:!e)}).each(function(){n.call(t,e,this,this)})})},getMarkers:function(n){this.getEditors(function(e){var t=this;v(e.getBody()).find('[data-wpview-marker="'+this.encodedText+'"]').each(function(){n.call(t,e,this)})})},replaceMarkers:function(){this.getMarkers(function(e,t){var n,i=t===e.selection.getNode();this.loader||v(t).text()===tinymce.DOM.decode(this.text)?(n=e.$('<div class="wpview wpview-wrap" data-wpview-text="'+this.encodedText+'" data-wpview-type="'+this.type+'" contenteditable="false"></div>'),e.undoManager.ignore(function(){e.$(t).replaceWith(n)}),i&&setTimeout(function(){e.undoManager.ignore(function(){e.selection.select(n[0]),e.selection.collapse()})})):e.dom.setAttrib(t,"data-wpview-marker",null)})},removeMarkers:function(){this.getMarkers(function(e,t){e.dom.setAttrib(t,"data-wpview-marker",null)})},setContent:function(n,i,e){_.isObject(n)&&(n.sandbox||n.head||-1!==n.body.indexOf("<script"))?this.setIframes(n.head||"",n.body,i,e):_.isString(n)&&-1!==n.indexOf("<script")?this.setIframes("",n,i,e):this.getNodes(function(e,t){-1!==(n=n.body||n).indexOf("<iframe")&&(n+='<span class="mce-shim"></span>'),e.undoManager.transact(function(){t.innerHTML="",t.appendChild(_.isString(n)?e.dom.createFragment(n):n),e.dom.add(t,"span",{class:"wpview-end"})}),i&&i.call(this,e,t)},e)},setIframes:function(p,f,m,e){var t,g=this;-1!==f.indexOf("[")&&-1!==f.indexOf("]")&&(t=new RegExp("\\[\\/?(?:"+n.mceViewL10n.shortcodes.join("|")+")[^\\]]*?\\]","g"),f=f.replace(t,function(e){return e.replace(/</g,"&lt;").replace(/>/g,"&gt;")})),this.getNodes(function(t,e){var n,i,s,o,a,r=t.dom,d="",c=t.getBody().className||"",l=t.getDoc().getElementsByTagName("head")[0];if(tinymce.each(r.$('link[rel="stylesheet"]',l),function(e){e.href&&-1===e.href.indexOf("skins/lightgray/content.min.css")&&-1===e.href.indexOf("skins/wordpress/wp-content.css")&&(d+=r.getOuterHTML(e))}),g.iframeHeight&&r.add(e,"span",{"data-mce-bogus":1,style:{display:"block",width:"100%",height:g.iframeHeight}},"\u200b"),t.undoManager.transact(function(){e.innerHTML="",n=r.add(e,"iframe",{src:tinymce.Env.ie?'javascript:""':"",frameBorder:"0",allowTransparency:"true",scrolling:"no",class:"wpview-sandbox",style:{width:"100%",display:"block"},height:g.iframeHeight}),r.add(e,"span",{class:"mce-shim"}),r.add(e,"span",{class:"wpview-end"})}),n.contentWindow){if(l=n.contentWindow,(i=l.document).open(),i.write('<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'+p+d+'<style>html {background: transparent;padding: 0;margin: 0;}body#wpview-iframe-sandbox {background: transparent;padding: 1px 0 !important;margin: -1px 0 0 !important;}body#wpview-iframe-sandbox:before,body#wpview-iframe-sandbox:after {display: none;content: "";}iframe {max-width: 100%;}</style></head><body id="wpview-iframe-sandbox" class="'+c+'">'+f+"</body></html>"),i.close(),g.iframeHeight&&(a=!0,setTimeout(function(){a=!1,u()},3e3)),v(l).on("load",u).on("unload",function(){t.isHidden()||(v(e).data("rendered",null),setTimeout(function(){w.mce.views.render()}))}),s=l.MutationObserver||l.WebKitMutationObserver||l.MozMutationObserver)i.body?h():i.addEventListener("DOMContentLoaded",h,!1);else for(o=1;o<6;o++)setTimeout(u,700*o);m&&m.call(g,t,e)}function u(){var e;a||n.contentWindow&&(e=v(n),g.iframeHeight=v(i.body).height(),e.height()!==g.iframeHeight&&(e.height(g.iframeHeight),t.nodeChanged()))}function h(){new s(_.debounce(u,100)).observe(i.body,{attributes:!0,childList:!0,subtree:!0})}},e)},setLoader:function(e){this.setContent('<div class="loading-placeholder"><div class="dashicons dashicons-'+(e||"admin-media")+'"></div><div class="wpview-loading"><ins></ins></div></div>')},setError:function(e,t){this.setContent('<div class="wpview-error"><div class="dashicons dashicons-'+(t||"no")+'"></div><p>'+e+"</p></div>")},match:function(e){e=t.next(this.type,e);if(e)return{index:e.index,content:e.content,options:{shortcode:e.shortcode}}},update:function(n,i,s,o){_.find(l,function(e,t){e=e.prototype.match(n);if(e)return v(s).data("rendered",!1),i.dom.setAttrib(s,"data-wpview-text",encodeURIComponent(n)),w.mce.views.createInstance(t,n,e.options,o).render(),i.selection.select(s),i.nodeChanged(),i.focus(),!0})},remove:function(e,t){this.unbindNode.call(this,e,t),e.dom.remove(t),e.focus()}})}(window,window.wp,window.wp.shortcode,window.jQuery),function(n,e,s,i){var t,o,a,r,d,c;function l(e){var t={};return n.tinymce?!e||-1===e.indexOf("<")&&-1===e.indexOf(">")?e:(r=r||new n.tinymce.html.Schema(t),d=d||new n.tinymce.html.DomParser(t,r),(c=c||new n.tinymce.html.Serializer(t,r)).serialize(d.parse(e,{forced_root_block:!1}))):e.replace(/<[^>]+>/g,"")}a={state:[],edit:function(e,t){var n=this.type,i=s[n].edit(e);this.pausePlayers&&this.pausePlayers(),_.each(this.state,function(e){i.state(e).on("update",function(e){t(s[n].shortcode(e).string(),"gallery"===n)})}),i.on("close",function(){i.detach()}),i.open()}},t=_.extend({},a,{state:["gallery-edit"],template:s.template("editor-gallery"),initialize:function(){var e=s.gallery.attachments(this.shortcode,s.view.settings.post.id),t=this.shortcode.attrs.named,n=this;e.more().done(function(){e=e.toJSON(),_.each(e,function(e){e.sizes&&(t.size&&e.sizes[t.size]?e.thumbnail=e.sizes[t.size]:e.sizes.thumbnail?e.thumbnail=e.sizes.thumbnail:e.sizes.full&&(e.thumbnail=e.sizes.full))}),n.render(n.template({verifyHTML:l,attachments:e,columns:t.columns?parseInt(t.columns,10):s.galleryDefaults.columns}))}).fail(function(e,t){n.setError(t)})}}),o=_.extend({},a,{action:"parse-media-shortcode",initialize:function(){var t=this,e=null;this.url&&(this.loader=!1,this.shortcode=s.embed.shortcode({url:this.text})),t.editor&&(e=t.editor.getBody().clientWidth),wp.ajax.post(this.action,{post_ID:s.view.settings.post.id,type:this.shortcode.tag,shortcode:this.shortcode.string(),maxwidth:e}).done(function(e){t.render(e)}).fail(function(e){t.url?(t.ignore=!0,t.removeMarkers()):t.setError(e.message||e.statusText,"admin-media")}),this.getEditors(function(e){e.on("wpview-selected",function(){t.pausePlayers()})})},pausePlayers:function(){this.getNodes(function(e,t,n){n=i("iframe.wpview-sandbox",n).get(0);(n=n&&n.contentWindow)&&n.mejs&&_.each(n.mejs.players,function(e){try{e.pause()}catch(e){}})})}}),a=_.extend({},o,{action:"parse-embed",edit:function(e,t){var n=s.embed.edit(e,this.url),i=this;this.pausePlayers(),n.state("embed").props.on("change:url",function(e,t){t&&e.get("url")&&(n.state("embed").metadata=e.toJSON())}),n.state("embed").on("select",function(){var e=n.state("embed").metadata;i.url?t(e.url):t(s.embed.shortcode(e).string())}),n.on("close",function(){n.detach()}),n.open()}}),e.register("gallery",_.extend({},t)),e.register("audio",_.extend({},o,{state:["audio-details"]})),e.register("video",_.extend({},o,{state:["video-details"]})),e.register("playlist",_.extend({},o,{state:["playlist-edit","video-playlist-edit"]})),e.register("embed",_.extend({},a)),e.register("embedURL",_.extend({},a,{match:function(e){e=/(^|<p>(?:<span data-mce-type="bookmark"[^>]+>\s*<\/span>)?)(https?:\/\/[^\s"]+?)((?:<span data-mce-type="bookmark"[^>]+>\s*<\/span>)?<\/p>\s*|$)/gi.exec(e);if(e)return{index:e.index+e[1].length,content:e[2],options:{url:!0}}}}))}(window,window.wp.mce.views,window.wp.media,window.jQuery);