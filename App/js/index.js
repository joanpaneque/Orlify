import Emesis from "./Emesis/Emesis.js";
// Allocators
import inputBlock from "./Allocators/inputBlock.js";
import inputSelect from "./Allocators/inputSelect.js";
import admin from "./Allocators/admin.js";

// "reciever": allocator
const emesis = new Emesis({
    "inputBlock": inputBlock,
    "inputSelect": inputSelect,
    "admin": admin
});