const capitalize = (s) => s && s.length > 0 && s[0].toUpperCase() + s.slice(1)

const reverse = (s) => s && s.split``.reverse().join``

const slugify = function slugFormatter (value) {
    var str = value;

    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "ăîâșțàáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aiastaaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}

const phone = function (value) {
    var str = value;
    str = str.replace(/[^0-9]/g, '')
    return str.replace(/ /g,'');
}
 
export default {
  capitalize,
  reverse,
  slugify,
  phone
}