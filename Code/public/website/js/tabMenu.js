function changeLinkText(_innerHTML)
{
    let mobileDropdownLinkRef = $('#mobileDropdownLink');
    if(mobileDropdownLinkRef){
        mobileDropdownLinkRef.html(mobileDropdownLinkRef.html().replace(mobileDropdownLinkRef.text(), _innerHTML));
    }
}
