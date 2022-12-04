"use strict";

initScroll();
showContactEmail();

Loader.lang = MAPY_API_LANG_CODE;
Loader.async = true;
Loader.load(null, null, createMap);

function initScroll() {
    const smoothScroll = new scrollToSmooth("a", {
        duration: 600,
        easing: "easeInOutExpo",
        offset: "#navbarMain"
    });

    smoothScroll.init();
}

function showContactEmail() {
    const encryptedAddr = "aW5mb0BhbGRyb3Zzbm93c3BvcnRzLmN6";
    const contactLink = document.querySelector("#contact");
    contactLink.setAttribute("href", "mailto:".concat(atob(encryptedAddr)));
    contactLink.innerHTML = atob(encryptedAddr);
}

function createMap() {
    const center = SMap.Coords.fromWGS84(15.521, 50.687);
    const address = SMap.Coords.fromWGS84(15.5274503, 50.6842158);

    const map = new SMap(JAK.gel("addressMapContainer"), center, 14);
    map.addDefaultLayer(SMap.DEF_BASE).enable();
    map.addDefaultControls();

    const layer = new SMap.Layer.Marker();
    map.addLayer(layer);
    layer.enable();

    const marker = new SMap.Marker(address, "aldrovSnowsports", {title: "Aldrov Snowsports"});
    layer.addMarker(marker);
}
