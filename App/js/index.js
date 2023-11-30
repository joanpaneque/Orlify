import Emesis from "./Emesis/Emesis.js";
// Allocators
import inputBlock from "./Allocators/inputBlock.js";
import reports from "./Allocators/reports.js";

// "reciever": allocator
const emesis = new Emesis({
    "inputBlock": inputBlock,
    "inputSelect": inputSelect,
    "admin": admin
});