//////////////////////////////////////////////////////////////////
// Add Profile button
//////////////////////////////////////////////////////////////////
(function() { 
	
    //botão service1
    tinymce.create('tinymce.plugins.service1', { 
        init : function(ed, url) { 
            ed.addButton('service1', { 
                title : 'Add button service1', 
                image : url+'/service1.png',   
                onclick : function() { 
                     ed.selection.setContent('[service1]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('service1', tinymce.plugins.service1); 
	
	//botãon service2
	tinymce.create('tinymce.plugins.service2', { 
        init : function(ed, url) { 
            ed.addButton('service2', { 
                title : 'Add button service2', 
                image : url+'/service2.png',   
                onclick : function() { 
                     ed.selection.setContent('[service2]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('service2', tinymce.plugins.service2); 

    //botãon service3
    tinymce.create('tinymce.plugins.service3', { 
        init : function(ed, url) { 
            ed.addButton('service3', { 
                title : 'Add button service3', 
                image : url+'/service3.png',   
                onclick : function() { 
                     ed.selection.setContent('[service3]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('service3', tinymce.plugins.service3); 

    //botãon service4
    tinymce.create('tinymce.plugins.service4', { 
        init : function(ed, url) { 
            ed.addButton('service4', { 
                title : 'Add button service4', 
                image : url+'/service4.png',   
                onclick : function() { 
                     ed.selection.setContent('[service4]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('service4', tinymce.plugins.service4); 

    //botãon service5
    tinymce.create('tinymce.plugins.service5', { 
        init : function(ed, url) { 
            ed.addButton('service5', { 
                title : 'Add button service5', 
                image : url+'/service5.png',   
                onclick : function() { 
                     ed.selection.setContent('[service5]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('service5', tinymce.plugins.service5); 

    //botãon service6
    tinymce.create('tinymce.plugins.service6', { 
        init : function(ed, url) { 
            ed.addButton('service6', { 
                title : 'Add button service6', 
                image : url+'/service6.png',   
                onclick : function() { 
                     ed.selection.setContent('[service6]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('service6', tinymce.plugins.service6); 

    //botãon service privado
    tinymce.create('tinymce.plugins.serviceprivado', { 
        init : function(ed, url) { 
            ed.addButton('serviceprivado', { 
                title : 'Add button Service Quarto Privado', 
                image : url+'/add.png',   
                onclick : function() { 
                     ed.selection.setContent('[serviceprivado text="default" icon="iconp1"]'); 
 
                } 
            }); 
        }, 
        createControl : function(n, cm) { 
            return null; 
        }, 
    }); 
    tinymce.PluginManager.add('serviceprivado', tinymce.plugins.serviceprivado); 
	
})();