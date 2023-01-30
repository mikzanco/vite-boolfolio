// creo un arrow function
const truncateText = (text, contentMaxLength) => {

    if(text.length > contentMaxLength){
    return text.slice(0, contentMaxLength) + '.....';
    }

return text;
}

export { truncateText };
