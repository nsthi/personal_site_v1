(function() {
	tinymce.PluginManager.requireLangPack('meteor_shortcodes');
	tinymce.create('tinymce.plugins.meteor_shortcodes', {
		init : function(ed, url) {

			ed.addCommand('mcemeteor_shortcodes', function() {
				ed.windowManager.open({
					file : url + '/interface.php',
					width : 410 + ed.getLang('meteor_shortcodes.delta_width', 0),
					height : 250 + ed.getLang('meteor_shortcodes.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			
			ed.addButton('meteor_shortcodes', {
				title : 'meteor_shortcodes.desc',
				cmd : 'mcemeteor_shortcodes',
				image : url + '/btn.png'
			});

			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('meteor_shortcodes', n.nodeName == 'IMG');
			});
		},
		
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'meteor_shortcodes',
					author 	  : 'truethemes',
					authorurl : 'http://truethemes.mysitemyway.com',
					infourl   : 'http://truethemes.mysitemyway.com',
					version   : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('meteor_shortcodes', tinymce.plugins.meteor_shortcodes);
})();


