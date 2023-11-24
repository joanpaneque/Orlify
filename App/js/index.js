import Emesis from "./Emesis/Emesis.js";
// Allocators
import inputBlock from "./Allocators/inputBlock.js";

// "reciever": allocator
const emesis = new Emesis({
    "inputBlock": inputBlock,
});