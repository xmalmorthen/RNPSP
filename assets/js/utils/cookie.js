var MyCookie = {
    objs : {
        coockieObj : Cookies.noConflict()        
    },
    session : {
        reset : function(){
            // sess_time_to_update = sess_base_time;
            // MyCookie.objs.coockieObj.remove('sessionCookie',{ path: ''});
            // sessionStorage.removeItem('sessionCookie');
            // MyCookie.session.save();
        },
        save : function(){
            // var sessionObj = {
            //     sess_base_time : sess_base_time,
            //     sess_time_to_update : sess_time_to_update,
            //     sess_time_left_to_confirm : sess_time_left_to_confirm
            // }
            // MyCookie.objs.coockieObj.set('sessionCookie',JSON.stringify(sessionObj));
            // sessionStorage.setItem("sessionCookie", JSON.stringify(sessionObj));
        },
        get : function(){
            // var sessionObj = MyCookie.objs.coockieObj.get('sessionCookie');
            // sessionObj = sessionStorage.getItem("sessionCookie");
            // if (sessionObj){
            //     return JSON.parse(sessionObj);
            // } else {
            //     return null;
            // }
        }
    },
    singleWindow : {
        objs : {
            COOKIE_NAME : 'singleWindow'
        },        
        save : function(){
            
            MyCookie.objs.coockieObj.set(MyCookie.singleWindow.objs.COOKIE_NAME,1,{ path : '/' });            
        },
        remove : function(){
            MyCookie.objs.coockieObj.remove(MyCookie.singleWindow.objs.COOKIE_NAME, { path: '/' });
        },
        get : function(){
            var singleWindow = MyCookie.objs.coockieObj.get(MyCookie.singleWindow.objs.COOKIE_NAME,{ path : '/' });
            return singleWindow;
        }
    }
}