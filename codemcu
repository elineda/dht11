#include <ThingSpeak.h>
#include <DHT.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
LiquidCrystal_I2C lcd(0x27,16,2);
#define DHTPIN 2
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);
ESP8266WiFiMulti WiFiMulti;
#include <ArduinoJson.h>


#define DHTPIN 2
#define DHTTYPE DHT11


int bleu=13;//d7
int vert=12;//d6
int rouge=14;//d5



const int RED = 16;//d0
const int GREEN = 0;//d3
const int BLUE = 15;//d8

int cr;
int cg;
int cb;

int h;
int v=1;
float s=0.5;
int fhi;
int hi;
float f;
float l;
float m;
float n;
float r;
float g;
float b;
int ro;
int go;
int bo;




 int myChannelNumber = 659348;
const char * myWriteAPIKey = "3PV82UJFWVGA5NRW";

WiFiClient client;


  String myStatus = "";


void setup(){

  pinMode(rouge, OUTPUT);
  pinMode(bleu, OUTPUT);
  pinMode(vert, OUTPUT);

  pinMode(RED, OUTPUT);
  pinMode(GREEN, OUTPUT);
  pinMode(BLUE, OUTPUT);

  Serial.begin(115200);
  Serial.println("Bonjour");
  Serial.println("DHT11 et afficheur");

  //demarrage du capteur DHT11
  dht.begin();

  lcd.init();
  lcd.backlight();

    WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("Elineda", "Iletaitunpetithumain");

  ThingSpeak.begin(client);

}
 void loop() {

     lcd.setCursor(0,0);
   lcd.print("Je suis   ");
   lcd.setCursor(12,0);
   lcd.print("* *");
   lcd.setCursor(0,1);
   lcd.print("la bombe !");
   lcd.setCursor(13,1);
   lcd.print("W");
  delay(10000);    //attendre 5s
dht.begin();

  float t = dht.readTemperature(); //mesure temperature (en ° celsius)
  float h = dht.readHumidity();   //mesure l'humidité (en %)

  //test si valeurs ont été récup
  if (isnan(h) || isnan(t)) {
    Serial.println("Failed to read from DHT sensor!"); //affiche message d'erreur
    return;                                            //quitte pour retenter lecture
  }
  else{
    ThingSpeak.setField(1, t);
    ThingSpeak.setField(2, h);

    ThingSpeak.setStatus(myStatus);

    int x = ThingSpeak.writeFields(myChannelNumber, myWriteAPIKey);
    if(x == 200){
        Serial.println("Channel update successful.");
      }
      else{
        Serial.println("Problem updating channel. HTTP error code " + String(x));
    }
    if (t<20){
      digitalWrite(bleu, 1);
      digitalWrite(vert, 0);
      digitalWrite(rouge, 0);
    }
    if(t>21 & t<26){
      digitalWrite(bleu, 0);
      digitalWrite(vert, 1);
      digitalWrite(rouge, 0);
    }
    if(t>25){
      digitalWrite(bleu, 0);
      digitalWrite(vert, 0);
      digitalWrite(rouge, 1);
    }


    if(t>0&t<9){
    cb=255/255*1023;
    cr=(255-(t/8*255))/255*1023;
    cg=0;
    }
    if(t>8&t<17){
    cb=255/255*1023;
    cg=(0+(t/8*255))/255*1023;
    cr=0;
    }
    if(t>16&t<25){
    cg=255/255*1023;
    cb=(255-(t/8*255))/255*1023;
    cr=0;
    }
    if(t>24&t<33){
    cg=255/255*1023;
    cr=(0+(t/8*255))/255*1023;
    cb=0;
    }
    if(t>32&t<41){
    cr=255/255*1023;
    cg=(255-(t/8*255))/255*1023;
    cb=0;
    }

  analogWrite(RED, cr);
  analogWrite(GREEN, cg);
  analogWrite(BLUE, cb);
  }
  // affichage des valeurs dans le bus serie
  Serial.print("Temperature : ");
  Serial.print(t);
  Serial.println("*C\t");

  lcd.setCursor(0,0);
  lcd.print("Temp:");
  lcd.setCursor(5,0);
  lcd.print(t);

  Serial.print("Humidité : ");
  Serial.print(h);
  Serial.println(" %");

  lcd.setCursor(0,1);
  lcd.print("Humi:");
  lcd.setCursor(5,1);
  lcd.print(h);
  delay(3000);



 if(WiFi.status()== WL_CONNECTED){   //Check WiFi connection status

    StaticJsonBuffer<300> JSONbuffer;   //Declaring static JSON buffer
    JsonObject& JSONencoder = JSONbuffer.createObject();

    JSONencoder["temperature"] = t;
    JSONencoder["humidite"] = h;

    char JSONmessageBuffer[300];
    JSONencoder.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    Serial.println(JSONmessageBuffer);



   HTTPClient http;    //Declare object of class HTTPClient

   http.begin("http://elineda.ovh/dht11/ok.php");      //Specify request destination
   http.addHeader("Content-Type", "application/json");  //Specify content-type header

   int httpCode = http.POST(JSONmessageBuffer);   //Send the request
   String payload = http.getString();                  //Get the response payload

   Serial.println(httpCode);   //Print HTTP return code
   Serial.println(payload);    //Print request response payload

   http.end();  //Close connection

 }else{

    Serial.println("Error in WiFi connection");

 }
  h=300-(t/40*300);
fhi=h/60;
hi=fhi%6;
f=(h/60)-hi;
l=v*(1-s);
m=v*(1*(f*s));
n=v*(1-((1-f)*s));
if(hi==0){
  r=v;
  g=n;
  b=l;
}
if(hi==1){
  r=m;
  g=v;
  b=l;
}
if(hi==2){
  r=l;
  g=v;
  b=n;
}
if(hi==3){
  r=l;
  g=m;
  b=v;
}
if(hi==4){
  r=n;
  g=l;
  b=v;
}
if(hi==5){
  r=v;
  g=l;
  b=m;
}
ro=r*255;
go=g*255;
bo=b*255;

 Serial.println(ro);
 Serial.println(go);
 Serial.println(bo);

 //  analogWrite(RED, ro);
  //analogWrite(GREEN, go);
  //analogWrite(BLUE, bo);

delay(300000);


 }
