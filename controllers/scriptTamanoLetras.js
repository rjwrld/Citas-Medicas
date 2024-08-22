function setFontSize(size) {
    let fontSize;
    if (size === 'small') {
        fontSize = '14px';
    } else if (size === 'medium') {
        fontSize = '16px';
    } else if (size === 'large') {
        fontSize = '18px';
    }
    document.body.style.fontSize = fontSize;
}