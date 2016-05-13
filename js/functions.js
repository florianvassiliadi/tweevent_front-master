function getPreferencesTypes(type)
{
    var action="";
    var divID="";
    if(type=="music")
    {
        action="get_musics";
        divID="#musicPreferences";
    }
    if(type=="drink")
    {
        action="get_drinks";
        divID="#drinkPreferences"; 
    }
    if(type=="food")
    {
        action="get_foods";
        divID="#foodPreferences"; 
    }
    $.ajax({ 
        type: 'GET', 
        url: 'http://localhost/Tweevent_Session2/tweevent_front-master/test.php?action='+action, 
        data: { get_param: 'libelle' }, 
        dataType: 'json',
        success: function (data) { 
            $.each(data, function(index, element) {
                console.log(element);
                $(divID).append("<div><input type='checkbox'/> "+element.libelle+"</div>");
            });
        }
    });
    console.log('http://localhost/Tweevent_Session2/tweevent_front-master/test.php?action='+action);
}  


